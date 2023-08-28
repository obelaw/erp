<?php

namespace Obelaw\Accounting\Http\Livewire\PriceList;

use Obelaw\Accounting\Model\PriceList;
use Obelaw\Accounting\Views\Layout;
use Obelaw\Framework\Base\ViewBase;

class ItemsPriceListComponent extends ViewBase
{
    public $list = null;
    public $viewId = 'obelaw_accounting_items_view';

    protected $pretitle = 'Inventories';
    protected $title = 'Inventories show';

    public function mount(PriceList $list)
    {
        $this->parameters(['list' => $list]);
    }

    public function layout()
    {
        return Layout::class;
    }
}
