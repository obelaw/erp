<?php

namespace Obelaw\Warehouse\Services;

use Exception;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Obelaw\Catalog\Models\Product;
use Obelaw\Warehouse\Enums\PlaceItemStatus;
use Obelaw\Warehouse\Enums\PlaceItemType;
use Obelaw\Warehouse\Models\Place;
use Obelaw\Warehouse\Models\Place\Inventory;
use Obelaw\Warehouse\Models\PlaceItem;

class PlaceService
{
    private const DEFAULT_SERIAL_DIGITS = 16;
    private const MIN_SERIAL_DIGITS = 8;
    private const MAX_SERIAL_DIGITS = 32;

    public function __construct(
        private Place $place
    ) {
        $this->validatePlace();
    }

    public function __toString(): string
    {
        return $this->place->name ?? 'Unknown Place';
    }

    /**
     * Validate that the place is properly initialized
     */
    private function validatePlace(): void
    {
        if (!$this->place || !$this->place->exists) {
            throw new InvalidArgumentException('Place must be a valid, persisted model instance.');
        }
    }

    /**
     * Generate a unique serial number with validation
     * 
     * @param int $digits Number of digits for the serial number
     * @return string Generated serial number
     * @throws InvalidArgumentException If digits parameter is invalid
     */
    public function generateSerialNumber(int $digits = self::DEFAULT_SERIAL_DIGITS): string
    {
        if ($digits < self::MIN_SERIAL_DIGITS || $digits > self::MAX_SERIAL_DIGITS) {
            throw new InvalidArgumentException(
                "Serial number digits must be between " . self::MIN_SERIAL_DIGITS . " and " . self::MAX_SERIAL_DIGITS
            );
        }

        do {
            $serialNumber = str_pad(
                (string) random_int(0, (int) (pow(10, $digits) - 1)),
                $digits,
                '0',
                STR_PAD_LEFT
            );
            
            // Ensure uniqueness by checking existing serial numbers
            $exists = PlaceItem::where('serial_number', $serialNumber)->exists();
        } while ($exists);

        return $serialNumber;
    }

    /**
     * Add a new item to the inventory place
     * 
     * @param mixed $sourceable The source entity for this item
     * @param string $sku Product SKU to add
     * @param string|null $serialNumber Optional custom serial number
     * @param PlaceItemType $type Type of item (STORABLE or CONSUMABLE)
     * @return PlaceItem Created place item
     * @throws InvalidArgumentException If place is not an Inventory instance
     * @throws ModelNotFoundException If product is not found
     * @throws Exception If database operation fails
     */
    public function addItem(
        mixed $sourceable, 
        string $sku, 
        ?string $serialNumber = null, 
        PlaceItemType $type = PlaceItemType::STORABLE
    ): PlaceItem {
        if (!$this->place instanceof Inventory) {
            throw new InvalidArgumentException('Add item requires a valid Inventory instance.');
        }

        if (!$sourceable || (!is_object($sourceable) || !method_exists($sourceable, 'getKey'))) {
            throw new InvalidArgumentException('Sourceable must be a valid model instance.');
        }

        $sku = trim($sku);
        if (empty($sku)) {
            throw new InvalidArgumentException('SKU cannot be empty.');
        }

        try {
            $product = $this->findProductBySku($sku);
            
            // Validate custom serial number if provided
            if ($serialNumber && $type === PlaceItemType::STORABLE) {
                $this->validateSerialNumber($serialNumber);
            }

            $data = [
                'sourceable_type' => get_class($sourceable),
                'sourceable_id' => $sourceable->getKey(),
                'product_id' => $product->id,
                'serial_number' => ($type === PlaceItemType::STORABLE) 
                    ? $serialNumber ?? $this->generateSerialNumber() 
                    : null,
                'type' => $type->value,
                'status' => PlaceItemStatus::IN->value,
            ];

            return DB::transaction(function () use ($data) {
                $item = $this->place->items()->create($data);

                return $item;
            });

        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new Exception('Failed to add item to place: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Find product by SKU
     * 
     * @param string $sku Product SKU
     * @return Product Found product
     * @throws ModelNotFoundException If product is not found
     */
    private function findProductBySku(string $sku): Product
    {
        $product = Product::where('inventory_sku', $sku)->first();
        
        if (!$product) {
            throw new ModelNotFoundException("Product not found for SKU: {$sku}");
        }
        
        return $product;
    }

    /**
     * Validate serial number format and uniqueness
     * 
     * @param string $serialNumber Serial number to validate
     * @throws InvalidArgumentException If serial number is invalid or already exists
     */
    private function validateSerialNumber(string $serialNumber): void
    {
        $serialNumber = trim($serialNumber);
        
        if (empty($serialNumber)) {
            throw new InvalidArgumentException('Serial number cannot be empty.');
        }
        
        if (strlen($serialNumber) < self::MIN_SERIAL_DIGITS) {
            throw new InvalidArgumentException('Serial number must be at least ' . self::MIN_SERIAL_DIGITS . ' characters long.');
        }
        
        // Check if serial number already exists
        if (PlaceItem::where('serial_number', $serialNumber)->exists()) {
            throw new InvalidArgumentException("Serial number '{$serialNumber}' already exists.");
        }
    }

    /**
     * Prepare an item for processing (move from IN to PENDING status)
     * 
     * @param string $sku Product SKU to prepare
     * @return PlaceItem Updated place item
     * @throws ModelNotFoundException If product or item is not found
     * @throws Exception If database operation fails or no available items
     */
    public function prepareItem(string $sku): PlaceItem
    {
        $sku = trim($sku);
        if (empty($sku)) {
            throw new InvalidArgumentException('SKU cannot be empty.');
        }

        try {
            $product = $this->findProductBySku($sku);

            $item = $this->place->items()
                ->where('product_id', $product->id)
                ->where('status', PlaceItemStatus::IN->value)
                ->first();

            if (!$item) {
                throw new ModelNotFoundException("No available item found for SKU: {$sku} in status IN");
            }

            return DB::transaction(function () use ($item, $sku) {
                $item->status = PlaceItemStatus::PENDING->value;
                $item->saveQuietly();
                
                return $item;
            });

        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new Exception('Failed to prepare item: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Deduct an item from inventory (move from PENDING to OUT status)
     * 
     * @param string $sku Product SKU to deduct
     * @return PlaceItem Updated place item
     * @throws ModelNotFoundException If product or item is not found
     * @throws Exception If database operation fails or no pending items
     */
    public function deductItem(string $sku): PlaceItem
    {
        $sku = trim($sku);
        if (empty($sku)) {
            throw new InvalidArgumentException('SKU cannot be empty.');
        }

        try {
            $product = $this->findProductBySku($sku);

            $item = $this->place->items()
                ->where('product_id', $product->id)
                ->where('status', PlaceItemStatus::PENDING->value)
                ->first();

            if (!$item) {
                throw new ModelNotFoundException("No pending item found for SKU: {$sku} in status PENDING");
            }

            return DB::transaction(function () use ($item, $sku) {
                $item->status = PlaceItemStatus::OUT->value;
                $item->saveQuietly();
                
                return $item;
            });

        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new Exception('Failed to deduct item: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Get available quantity for a specific SKU
     * 
     * @param string $sku Product SKU
     * @param PlaceItemStatus|null $status Optional status filter
     * @return int Available quantity
     */
    public function getAvailableQuantity(string $sku, ?PlaceItemStatus $status = null): int
    {
        try {
            $product = $this->findProductBySku($sku);
            
            $query = $this->place->items()->where('product_id', $product->id);
            
            if ($status) {
                $query->where('status', $status->value);
            } else {
                // Default to IN status items
                $query->where('status', PlaceItemStatus::IN->value);
            }
            
            return $query->count();
            
        } catch (ModelNotFoundException $e) {
            return 0; // Product not found means 0 quantity
        }
    }

    /**
     * Check if enough quantity is available for a specific SKU
     * 
     * @param string $sku Product SKU
     * @param int $requiredQuantity Required quantity
     * @param PlaceItemStatus|null $status Optional status filter
     * @return bool True if enough quantity is available
     */
    public function hasAvailableQuantity(string $sku, int $requiredQuantity, ?PlaceItemStatus $status = null): bool
    {
        $availableQuantity = $this->getAvailableQuantity($sku, $status);
        return $availableQuantity >= $requiredQuantity;
    }

    /**
     * Get all items in this place for a specific SKU
     * 
     * @param string $sku Product SKU
     * @param PlaceItemStatus|null $status Optional status filter
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getItemsBySku(string $sku, ?PlaceItemStatus $status = null)
    {
        try {
            $product = $this->findProductBySku($sku);
            
            $query = $this->place->items()->where('product_id', $product->id);
            
            if ($status) {
                $query->where('status', $status->value);
            }
            
            return $query->get();
            
        } catch (ModelNotFoundException $e) {
            return collect(); // Return empty collection if product not found
        }
    }

    /**
     * Get the place instance
     * 
     * @return Place
     */
    public function getPlace(): Place
    {
        return $this->place;
    }
}
