<?php

namespace Obelaw\Sales\Livewire\Customers;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('sales_customers_index')]
class IndexCustomersComponent extends GridRender
{
    public $gridId = 'obelaw_sales_customers_index';
    protected $pretitle = 'Customers';
    protected $title = 'Customers Listing';
}
