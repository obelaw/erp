<?php

namespace Obelaw\Accounting\Livewire\PriceList;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('accounting_pricelist_index')]
class IndexPriceListComponent extends GridRender
{
    public $gridId = 'obelaw_accounting_pricelist_index';

    protected $pretitle = 'Price list';
    protected $title = 'Price list listing';
}
