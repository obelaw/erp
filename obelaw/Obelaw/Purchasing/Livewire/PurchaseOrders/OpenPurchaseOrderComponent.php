<?php

namespace Obelaw\Purchasing\Livewire\PurchaseOrders;

use Livewire\Component;
use Obelaw\Purchasing\Models\PurchaseOrder;
use Obelaw\Purchasing\Support\Facades\Orders;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('sales_sales_order_open')]
class OpenPurchaseOrderComponent extends Component
{
    use BootPermission;

    public $order = null;

    public $income_account = null;


    public function mount(PurchaseOrder $order)
    {
        $this->order = $order;
        $this->income_account = config('obelaw.erp.sales.income_account');
    }

    public function render()
    {
        return view('obelaw-purchasing::purchase-order.open')->layout(DashboardLayout::class);
    }

    public function billIt()
    {
        $bill = Orders::billIt($this->order->id);

        if ($bill) {
            redirect()->route('obelaw.purchasing.bills.open', [$bill]);
        }
    }
}
