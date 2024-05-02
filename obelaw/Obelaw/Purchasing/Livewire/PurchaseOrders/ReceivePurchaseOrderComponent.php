<?php

namespace Obelaw\Purchasing\Livewire\PurchaseOrders;

use Livewire\Component;
use Obelaw\ERP\CalculateReceipt;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Purchasing\Enums\ReceiveStatus;
use Obelaw\Purchasing\Models\Product;
use Obelaw\Purchasing\Models\PurchaseOrder;
use Obelaw\Purchasing\Models\PurchaseReceiveItem;
use Obelaw\Purchasing\Models\Vendor;
use Obelaw\Purchasing\Support\Facades\Orders;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;
use Obelaw\Warehouse\Facades\Adjustments;
use Obelaw\Warehouse\Lib\DTOs\Adjustment\InitAdjustmentDTO;
use Obelaw\Warehouse\Models\Place\Inventory;

#[Access('sales_sales_order_create')]
class ReceivePurchaseOrderComponent extends Component
{
    use BootPermission;
    use PushAlert;

    public $basketQuotes = null;
    public $inventory_id = null;
    public $receive = null;
    public $isReceived = null;
    public $updateQuantityItem = null;
    public $valueQuantityItem = null;
    public $mangerCurrentPO = null;
    public $inventories = null;

    public function mount(PurchaseOrder $order)
    {
        $this->mangerCurrentPO = $order;

        $this->inventories = Inventory::get()->map(function ($r) {
            return [
                'label' => $r['name'],
                'value' => $r['id'],
            ];
        })->toArray();

        $this->updateTotals();
    }

    public function render()
    {
        return view('obelaw-purchasing::purchase-order.receive')
            ->layout(DashboardLayout::class);
    }

    public function updateTotals()
    {
        $order = $this->mangerCurrentPO;
        if (!$receive = $order->receive()->where('order_id', $order->id)->first())
            $receive = $order->receive()->create([
                'order_id' => $order->id,
            ]);

        $this->isReceived = ($receive->status == ReceiveStatus::RECEIVED());

        foreach ($order->items as $item) {
            if (!$receive->items()->where('order_item_id', $item->id)->first())
                $receive->items()->create([
                    'order_item_id' => $item->id,
                    'received_quantity' => $item->item_quantity,
                ]);
        }

        $this->receive = $receive;
        $this->basketQuotes = $receive->items;
    }

    public function increase(PurchaseReceiveItem $purchaseReceiveItem)
    {
        $purchaseReceiveItem->increment('received_quantity');

        $this->updateTotals();
    }

    public function initUpdateQuantity(PurchaseReceiveItem $purchaseReceiveItem)
    {
        $this->updateQuantityItem = $purchaseReceiveItem;
    }

    public function updateQuantity()
    {
        // Orders::manger($this->mangerCurrentPO)->updateQuantity($this->updateQuantityItem, $this->valueQuantityItem);
        $this->updateQuantityItem->received_quantity = $this->valueQuantityItem;
        $this->updateQuantityItem->save();

        $this->updateTotals();
        $this->updateQuantityItem = null;
        $this->valueQuantityItem = null;
    }

    public function decrease(PurchaseReceiveItem $purchaseReceiveItem)
    {
        $purchaseReceiveItem->decrement('received_quantity');

        $this->updateTotals();
    }

    public function receiveIt()
    {
        if (!$this->inventory_id)
            return $this->pushAlert('error', 'Set Inventory');

        foreach ($this->basketQuotes as $item) {
            // dd($item);
            Adjustments::new(new InitAdjustmentDTO(
                place_id: $this->inventory_id,
                product_id: $item->orderItem->product->id,
                quantity: $item->received_quantity,
                description: 'PO',
            ));
        }

        $this->receive->status = ReceiveStatus::RECEIVED();
        $this->receive->save();
        $this->isReceived = $this->receive->status;

        return $this->pushAlert('success', 'Received');
    }
}
