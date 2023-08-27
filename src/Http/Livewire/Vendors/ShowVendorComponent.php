<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\Framework\Base\ViewBase;
use Obelaw\Accounting\Views\Layout;

class ShowVendorComponent extends ViewBase
{
    public $vendor = null;
    public $viewId = 'obelaw_accounting_vendor_view';

    protected $pretitle = 'Vendor';
    protected $title = 'Vendor show';

    public function mount(Vendor $vendor)
    {
        $this->parameters(['vendor' => $vendor]);
    }

    public function layout()
    {
        return Layout::class;
    }
}
