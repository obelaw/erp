<?php

namespace Obelaw\Purchasing\Livewire\Bills;

use Obelaw\Purchasing\Models\Vendor;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('purchasing_bills_index')]
class IndexBillsComponent extends GridRender
{
    public $gridId = 'obelaw_purchasing_bills_index';

    protected $pretitle = 'Bills';
    protected $title = 'Bills Listing';

    public function vendorName($value)
    {
        $vendor = Vendor::find($value);

        return '<a href="' . route('obelaw.purchasing.vendors.show', [$vendor]) . '">' . $vendor->name . '</a>';
    }
}
