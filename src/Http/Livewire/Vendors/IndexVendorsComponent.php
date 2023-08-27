<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\Framework\Base\GridBase;
use Obelaw\Accounting\Views\Layout;

class IndexVendorsComponent extends GridBase
{
    public $gridId = 'obelaw_accounting_vendors_index';

    protected $pretitle = 'Vendors';
    protected $title = 'Vendors listing';

    public function layout()
    {
        return Layout::class;
    }
}
