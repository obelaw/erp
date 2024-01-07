<?php

namespace Obelaw\Warehouse\Livewire\Transfers;

use Livewire\Component;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Views\Layout\DashboardLayout;
use Obelaw\Warehouse\Models\Transfer;

#[Access('warehouse_transfer_show')]
class ShowTransferComponent extends Component
{
    public $transfer = null;

    public function mount(Transfer $transfer)
    {
        $this->transfer = $transfer;
    }

    public function render()
    {
        return view('obelaw-warehouse::transfers.show')->layout(DashboardLayout::class);
    }
}
