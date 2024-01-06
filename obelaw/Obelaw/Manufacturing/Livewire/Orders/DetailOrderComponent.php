<?php

namespace obelaw\manufacturing\livewire\orders;

use livewire\component;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Views\Layout\DashboardLayout;
use Obelaw\Manufacturing\Facades\Orders;
use Obelaw\Manufacturing\Models\Manufactured;
use Obelaw\Manufacturing\Models\Order;

#[Access('manufacturing_orders_detail')]
class DetailOrderComponent extends component
{
    public $order;

    public function mount($order)
    {
        $this->order = Order::with(['product', 'inventory'])->findOrFail($order);
    }

    public function render()
    {
        return view('obelaw-manufacturing::orders.detail', [
            'totalCost' => Orders::costTotal($this->order->product->id),
        ])->layout(DashboardLayout::class);
    }

    public function updateStatus(string $status)
    {
        $this->order->status = $status;
        $this->order->save();
    }

    public function moveToStock()
    {
        $manufactured = Manufactured::create([
            'order_id' => $this->order->id,
            'inventory_id' => 1,
            'product_id' => $this->order->product->id,
            'quantity' => $this->order->quantity,
        ]);

        $manufactured->transfer()->create([
            'inventory_to' => 1,
            'product_id' => $this->order->product->id,
            'quantity' => $this->order->quantity,
        ]);

        for ($x = 1; $x <= $this->order->quantity; $x++) {
            $manufactured->inventoryItem()->create([
                'inventory_id' => 1,
                'product_id' => $this->order->product->id,
                'status' => 'stock',
            ]);
        }
    }
}
