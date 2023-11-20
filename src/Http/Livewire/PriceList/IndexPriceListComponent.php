<?php

namespace Obelaw\Accounting\Http\Livewire\PriceList;

use Obelaw\Framework\ACL\Attributes\PermissionAccess;
use Obelaw\Framework\Base\GridBase;

#[PermissionAccess('accounting_pricelist_index')]
class IndexPriceListComponent extends GridBase
{
    public $gridId = 'obelaw_accounting_pricelist_index';

    protected $pretitle = 'Price list';
    protected $title = 'Price list listing';
}
