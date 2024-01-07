<?php

namespace Obelaw\Sales\Livewire\Coupons;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Sales\Models\Coupon;

#[Access('sales_coupons_create')]
class CreateCouponComponent extends FormRender
{
    public $formId = 'obelaw_sales_coupon_form';

    protected $pretitle = 'Coupons';
    protected $title = 'Create New Coupon';

    public function submit()
    {
        $validateData = $this->getInputs();

        Coupon::create($validateData);

        return $this->pushAlert('success', 'The contact has been created');
    }
}
