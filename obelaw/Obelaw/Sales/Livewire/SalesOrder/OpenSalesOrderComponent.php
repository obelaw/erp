<?php

namespace Obelaw\Sales\Livewire\SalesOrder;

use Livewire\Component;
use Obelaw\Accounting\DTO\Entry\AmountEntryDTO;
use Obelaw\Accounting\DTO\Entry\CreateEntryDTO;
use Obelaw\Accounting\Facades\Entries;
use Obelaw\Sales\Facades\SalesOrders;
use Obelaw\Sales\Models\SalesOrder;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('sales_sales_order_open')]
class OpenSalesOrderComponent extends Component
{
    use BootPermission;

    public $order = null;

    public $income_account = null;


    public function mount(SalesOrder $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('obelaw-sales::salesorder.open')->layout(DashboardLayout::class);
    }

    public function invoiceIt()
    {
        // dd($this->income_account);

        $invoice = SalesOrders::invoiceIt($this->order, $this->income_account);

        if ($invoice) {
            redirect()->route('obelaw.sales.invoices.open', [$invoice]);
        }
    }
}
