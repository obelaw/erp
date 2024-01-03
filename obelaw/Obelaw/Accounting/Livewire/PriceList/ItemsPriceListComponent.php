<?php

namespace Obelaw\Accounting\Livewire\PriceList;

use Obelaw\Accounting\Model\PriceList;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Renderer\ViewRender;

#[Access('accounting_pricelist_items')]
class ItemsPriceListComponent extends ViewRender
{
    use BootPermission;

    public $list = null;
    public $viewId = 'obelaw_accounting_items_view';

    protected $pretitle = 'PriceList';
    protected $title = 'PriceList show';

    public function mount(PriceList $list)
    {
        $this->parameters(['list' => $list]);
    }
}
