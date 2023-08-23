<?php

namespace Obelaw\Accounting\Http\Livewire\PriceList;

use Obelaw\Framework\Base\ViewBase;
use Obelaw\Accounting\Views\Layout;

class ItemsPriceListComponent extends ViewBase
{
    public $list = null;
    public $viewId = 'obelaw_accounting_items_view';

    protected $pretitle = 'Inventories';
    protected $title = 'Inventories show';

    public function mount($list)
    {
        $this->parameters(['list' => $list]);
    }

    public function layout()
    {
        return Layout::class;
    }
}
