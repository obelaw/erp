<?php

namespace Obelaw\Purchasing\Lib\Services;

use Obelaw\Catalog\Models\Product;
use Obelaw\Purchasing\Models\PurchaseOrder;


class PurchaseOrderMangerService
{
    public function __construct(public PurchaseOrder $order)
    {
    }

    public function addItem(Product $product)
    {
        $this->order->items()->updateOrCreate([
            'product_id' => $product->id,
            'item_price' => $product->price_purchase,
        ], [
            'item_quantity' => \DB::raw('item_quantity + 1')
        ]);
    }

    public function getItems()
    {
        return $this->order->items;
    }

    public function getItemsForCalculate()
    {
        return $this->order->items->map(function ($item) {
            return [
                'price' => $item['item_price'],
                'quantity' => $item['item_quantity'],
            ];
        })->toArray();
    }

    public function increase(Product $product, $itemQuantity = 1)
    {
        $this->order->items()->updateOrCreate([
            'product_id' => $product->id,
        ], [
            'item_quantity' => \DB::raw('item_quantity + ' . $itemQuantity)
        ]);
    }

    public function decrease(Product $product, $itemQuantity = 1)
    {
        if ($item = $this->order->items()->where('product_id', $product->id)->first())
            if ($item->item_quantity == 1)
                return $item->delete();

        $this->order->items()->updateOrCreate([
            'product_id' => $product->id,
        ], [
            'item_quantity' => \DB::raw('item_quantity - ' . $itemQuantity)
        ]);
    }

    public function updateQuantity(Product $product, $quantity)
    {
        if ($item = $this->order->items()->where('product_id', $product->id)->first()) {
            if ($quantity == 0)
                return $item->delete();

            $item->item_quantity = $quantity;
            $item->save();
        }
    }
}
