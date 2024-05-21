<?php

namespace Obelaw\Warehouse\Livewire\Bundles\Views\Buttons;

use Obelaw\Warehouse\Enums\TransferBundleSerialStatus;
use Obelaw\Warehouse\Enums\TransferBundleStatus;
use Obelaw\Warehouse\Livewire\Inventories\Views\Buttons\ExportButton;
use Obelaw\Warehouse\Models\TransferBundle;

class CloseBundle extends ExportButton
{
    public TransferBundle $bundle;

    protected $label = 'Confirm Bundle';

    public function mount(TransferBundle $bundle)
    {
        $this->bundle = $bundle;
    }

    public function click()
    {
        if ($this->bundle->status = TransferBundleStatus::CONFIRM())
            return $this->pushAlert('warning', 'This operation is confirmed');

        if ($this->bundle->serials()->where('status', TransferBundleSerialStatus::PENDING())->count() != 0)
            return $this->pushAlert('warning', 'You must close all series');

        $this->bundle->status = TransferBundleStatus::CONFIRM();
        $this->bundle->save();

        return $this->pushAlert('success', 'The operation has been confirmed');
    }
}
