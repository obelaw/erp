<?php

namespace Obelaw\Accounting\Http\Livewire\PriceList;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('accounting_pricelist_index')]
class IndexPriceListComponent extends GridRender
{
    public $gridId = 'obelaw_accounting_pricelist_index';

    protected $pretitle = 'Price list';
    protected $title = 'Price list listing';
}
