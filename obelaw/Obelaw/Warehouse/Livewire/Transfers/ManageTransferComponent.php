<?php

namespace Obelaw\Warehouse\Livewire\Transfers;

use Livewire\Component;
use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;
use Obelaw\Warehouse\Enums\TransferStatus;
use Obelaw\Warehouse\Models\Transfer;
use Obelaw\Warehouse\Models\TransferItem;

#[Access('sales_sales_order_create')]
class ManageTransferComponent extends Component
{
    use BootPermission;
    use PushAlert;

    public $canManage = null;
    public $transfer = null;
    public $currentItems = null;
    public $updateQuantityItem = null;
    public $valueQuantityItem = null;

    public function boot()
    {
    }

    public function mount(Transfer $transfer)
    {
        $this->transfer = $transfer;
        $this->currentItems = $transfer->items;

        $this->canManage = in_array($this->transfer->status, [TransferStatus::DRAFT(), TransferStatus::WAITING()]);
    }

    public function render()
    {
        return view('obelaw-warehouse::transfers.manage', [
            'products' => Product::get(),
            'current_items' => $this->currentItems,
        ])->layout(DashboardLayout::class);
    }

    public function updateTransfer()
    {
        $this->currentItems = $this->transfer->items;
    }

    public function addToBacket(Product $product)
    {
        if (!$this->canManage)
            return $this->pushAlert('success', 'you cun\'t Manage');

        TransferItem::updateOrCreate([
            'transfer_id' => $this->transfer->id,
            'product_id' => $product->id,
        ], [
            'quantity' => \DB::raw('quantity + 1')
        ]);

        if ($this->transfer->status == TransferStatus::DRAFT()) {
            $this->transfer->status = TransferStatus::WAITING;
            $this->transfer->save();
        }

        $this->updateTransfer();
    }

    public function increase(TransferItem $item)
    {
        if (!$this->canManage)
            return $this->pushAlert('success', 'you cun\'t Manage');

        $item->increment('quantity', 1);
        $this->updateTransfer();
    }

    public function initUpdateQuantity(TransferItem $item)
    {
        if (!$this->canManage)
            return $this->pushAlert('success', 'you cun\'t Manage');

        $this->updateQuantityItem = $item;
    }

    public function updateQuantity()
    {
        if (!$this->canManage)
            return $this->pushAlert('success', 'you cun\'t Manage');

        if ($this->valueQuantityItem == 0) {
            $this->updateQuantityItem->delete();
            $this->updateQuantityItem = null;
            return false;
        }

        $this->updateQuantityItem->quantity = $this->valueQuantityItem;
        $this->updateQuantityItem->save();

        // $this->updateQuantityItem->quote()->increment('quantity', $this->valueQuantityItem - $this->updateQuantityItem->quote->quantity);
        $this->updateTransfer();
        $this->updateQuantityItem = null;
        $this->valueQuantityItem = null;
        // dd($this->updateQ, $this->valueQ, $this->cart);
    }

    public function decrease(TransferItem $item)
    {
        if (!$this->canManage)
            return $this->pushAlert('success', 'you cun\'t Manage');

        if ($item->quantity == 1) {
            $item->delete();
            return $this->updateTransfer();
        }

        $item->decrement('quantity', 1);
        $this->updateTransfer();
    }

    public function createBundles()
    {
        foreach ($this->currentItems as $item) {
            $item->bundle()->create([
                'transfer_id' => $this->transfer->id,
                'serialized' => ($item->product->product_type == 3) ? true : false,
            ]);
        }

        if ($this->transfer->status == TransferStatus::WAITING()) {
            $this->transfer->status = TransferStatus::READY;
            $this->transfer->save();
        }

        return redirect()->route('obelaw.warehouse.transfer.show', [$this->transfer]);
    }
}
