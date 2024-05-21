<?php

namespace Obelaw\Purchasing\Livewire\Vendors;

use Obelaw\Purchasing\Models\Vendor;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\ViewRender;

#[Access('purchasing_vendors_show')]
class ShowVendorComponent extends ViewRender
{
    public $vendor = null;
    public $viewId = 'obelaw_purchasing_vendor_view';

    protected $pretitle = 'Vendor';
    protected $title = 'Vendor show';

    public function mount(Vendor $vendor)
    {
        $this->parameters(['vendor' => $vendor]);
    }
}
