<?php

namespace Obelaw\Sales\Livewire\SalesOrder;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\UI\Renderer\ViewRender;

#[Access('sales_sales_order_open')]
class ShowSalesOrderComponent extends ViewRender
{
    public $entry = null;
    public $viewId = 'obelaw_sales_order_view';

    protected $pretitle = 'Order';
    protected $title = 'Order show';

    public function mount(SalesFlatOrder $order)
    {
        $this->parameters(['order' => $order]);
    }
}
