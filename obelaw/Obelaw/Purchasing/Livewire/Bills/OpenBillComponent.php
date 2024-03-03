<?php

namespace Obelaw\Purchasing\Livewire\Bills;

use Livewire\Component;
use Obelaw\Accounting\Model\Bill;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('sales_invoices_open')]
class OpenBillComponent extends Component
{
    use BootPermission;

    public $bill = null;

    public function mount(Bill $bill)
    {
        $this->bill = $bill;
    }

    public function render()
    {
        return view('obelaw-purchasing::bills.open')->layout(DashboardLayout::class);
    }
}
