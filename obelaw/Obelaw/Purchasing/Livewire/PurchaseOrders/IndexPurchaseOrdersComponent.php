<?php

namespace Obelaw\Purchasing\Livewire\PurchaseOrders;

use Obelaw\Purchasing\Models\Vendor;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('purchasing_vendors_index')]
class IndexPurchaseOrdersComponent extends GridRender
{
    public $gridId = 'obelaw_purchasing_orders_index';

    protected $pretitle = 'Purchasing';
    protected $title = 'Orders listing';

    public function vendorName($value)
    {
        $vendor = Vendor::find($value);

        return '<a href="' . route('obelaw.purchasing.vendors.show', [$vendor]) . '">' . $vendor->name . '</a>';
    }
}
