<?php

namespace Obelaw\Sales\Livewire\SalesOrder;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('sales_sales_order_index')]
class IndexCreateSalesComponent extends GridRender
{
    public $gridId = 'obelaw_sales_sales_orders_index';

    protected $pretitle = 'Sales Order';
    protected $title = 'Sales Order Listing';
}
