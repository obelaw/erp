<?php

namespace Obelaw\Warehouse\Livewire\SerialNumbers;

use livewire\component;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;
use Obelaw\Warehouse\Models\InventoryItem;

#[Access('warehouse_serial_numbers_detail')]
class DetailSerialNumberComponent extends component
{
    use BootPermission;

    public $item;

    public function mount(InventoryItem $item)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('obelaw-warehouse::serialnumbers.detail')->layout(DashboardLayout::class);
    }
}
