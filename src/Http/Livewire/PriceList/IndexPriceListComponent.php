<?php

namespace Obelaw\Accounting\Http\Livewire\PriceList;

use Obelaw\Framework\Base\GridBase;
use Obelaw\Accounting\Views\Layout;

class IndexPriceListComponent extends GridBase
{
    public $gridId = 'obelaw_accounting_pricelist_index';

    protected $pretitle = 'Price list';
    protected $title = 'Price list listing';

    public function layout()
    {
        return Layout::class;
    }
}
