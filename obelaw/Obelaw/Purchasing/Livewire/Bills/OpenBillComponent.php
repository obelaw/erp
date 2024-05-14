<?php

namespace Obelaw\Purchasing\Livewire\Bills;

use Livewire\Component;
use Obelaw\Accounting\Model\Bill;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('purchasing_bills_show')]
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
