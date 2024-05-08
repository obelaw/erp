<?php

namespace Obelaw\Sales\Livewire\SalesOrder\Views\Buttons;

use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\Warehouse\Enums\TransferBundleSerialStatus;
use Obelaw\Warehouse\Enums\TransferBundleStatus;
use Obelaw\Warehouse\Livewire\Inventories\Views\Buttons\ExportButton;

class InvoiceItButton extends ExportButton
{
    public SalesFlatOrder $order;

    protected $label = 'Invoice It';

    public function mount(SalesFlatOrder $order)
    {
        $this->order = $order;
    }

    public function click()
    {
        // dd($this->order);
        // if ($this->bundle->status = TransferBundleStatus::CONFIRM())
        //     return $this->pushAlert('warning', 'This operation is confirmed');

        // if ($this->bundle->serials()->where('status', TransferBundleSerialStatus::PENDING())->count() != 0)
        //     return $this->pushAlert('warning', 'You must close all series');

        // $this->bundle->status = TransferBundleStatus::CONFIRM();
        // $this->bundle->save();

        return $this->pushAlert('success', 'The Invoice has been created!');
    }
}
