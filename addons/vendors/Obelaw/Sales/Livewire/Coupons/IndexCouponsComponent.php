<?php

namespace Obelaw\Sales\Livewire\Coupons;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('sales_coupons_index')]
class IndexCouponsComponent extends GridRender
{
    public $gridId = 'obelaw_sales_coupons_index';

    protected $pretitle = 'Coupons';
    protected $title = 'Coupons Listing';
}
