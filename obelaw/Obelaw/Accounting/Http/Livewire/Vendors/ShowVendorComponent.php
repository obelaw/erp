<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\ViewRender;

#[Access('accounting_vendors_show')]
class ShowVendorComponent extends ViewRender
{
    public $vendor = null;
    public $viewId = 'obelaw_accounting_vendor_view';

    protected $pretitle = 'Vendor';
    protected $title = 'Vendor show';

    public function mount(Vendor $vendor)
    {
        $this->parameters(['vendor' => $vendor]);
    }
}
