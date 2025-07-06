<?php

namespace Obelaw\Warehouse\Models\Imports;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Obelaw\Catalog\Models\Product;
use Obelaw\Warehouse\Enums\PlaceItemStatus;
use Obelaw\Warehouse\Enums\PlaceItemType;
use Obelaw\Warehouse\Facades\Warehouse;

class ItemsImport implements ToCollection, WithHeadingRow, WithValidation
{
    private int $successCount = 0;
    private int $errorCount = 0;
    private array $errors = [];

    public function __construct(private $place) {}

    public function collection(Collection $rows): void
    {

        foreach ($rows as $row) {
            try {
                $this->processRow($row->toArray());
                $this->successCount++;
            } catch (Exception $e) {
                $this->errorCount++;
                $this->errors[] = [
                    'row' => $row->toArray(),
                    'error' => $e->getMessage()
                ];

                Log::warning('Item import row failed', [
                    'row_data' => $row->toArray(),
                    'error' => $e->getMessage()
                ]);
            }
        }

        // Log import summary
        Log::info('Item import completed', [
            'success_count' => $this->successCount,
            'error_count' => $this->errorCount,
            'total_rows' => $rows->count()
        ]);
    }

    private function processRow(array $row): void
    {

        // Validate required fields
        $validator = Validator::make($row, [
            'sku' => 'required|string',
            'product_name' => 'nullable|string',
            'serial_number' => 'nullable|string',
            'type' => 'nullable|string|in:storable,consumable',
            'status' => 'nullable|string|in:in,out,pending',
            'quantity' => 'nullable|integer|min:1',
        ]);

        // dd($row);

        $place = Warehouse::place($this->place);
        $item = $place->addItem($this->place, $row['sku'], type: PlaceItemType::STORABLE);


        // if ($validator->fails()) {
        //     throw new Exception('Validation failed: ' . implode(', ', $validator->errors()->all()));
        // }

        // // Find or create product
        // $product = Product::where('inventory_sku', $row['sku'])->first();

        // if (!$product) {
        //     throw new Exception("Product not found for SKU: {$row['sku']}");
        // }

        // // Determine item type
        // $type = isset($row['type'])
        //     ? PlaceItemType::from($row['type'])
        //     : PlaceItemType::STORABLE;

        // // Determine status
        // $status = isset($row['status'])
        //     ? PlaceItemStatus::from($row['status'])
        //     : PlaceItemStatus::IN;

        // // Handle quantity (for bulk import)
        // $quantity = $row['quantity'] ?? 1;

        // dd($row);
        // // Create items based on quantity
        // for ($i = 0; $i < $quantity; $i++) {
        //     $this->createPlaceItem($product, $row, $type, $status);
        // }
    }

    private function createPlaceItem(Product $product, array $row, PlaceItemType $type, PlaceItemStatus $status): void
    {
        // This is a placeholder - in real implementation, you'd need access to the inventory/place
        // For now, we'll just demonstrate the structure

        $data = [
            'product_id' => $product->id,
            'serial_number' => $type === PlaceItemType::STORABLE
                ? ($row['serial_number'] ?? $this->generateSerialNumber())
                : null,
            'type' => $type->value,
            'status' => $status->value,
            // 'place_id' => $inventory->id, // Would need to be passed in
            // 'sourceable_type' => 'Import',  // Would need to be passed in
            // 'sourceable_id' => $importId,  // Would need to be passed in
        ];

        // TODO: Create the actual PlaceItem when inventory context is available
        Log::info('Would create place item', $data);
    }

    private function generateSerialNumber(): string
    {
        return str_pad((string) random_int(0, 99999999999999999), 16, '0', STR_PAD_LEFT);
    }

    public function rules(): array
    {
        return [
            'sku' => 'required|string',
            'product_name' => 'nullable|string',
            'serial_number' => 'nullable|string',
            'type' => 'nullable|string|in:storable,consumable',
            'status' => 'nullable|string|in:in,out,pending',
            'quantity' => 'nullable|integer|min:1',
        ];
    }

    public function getSuccessCount(): int
    {
        return $this->successCount;
    }

    public function getErrorCount(): int
    {
        return $this->errorCount;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
