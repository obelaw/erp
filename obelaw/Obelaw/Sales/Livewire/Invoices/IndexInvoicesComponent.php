<?php

namespace Obelaw\Sales\Livewire\Invoices;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('sales_invoices_index')]
class IndexInvoicesComponent extends GridRender
{
    public $gridId = 'obelaw_sales_invoices_index';

    protected $pretitle = 'Invoices';
    protected $title = 'Invoices Listing';
}
