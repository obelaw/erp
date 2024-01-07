<?php

namespace Obelaw\Sales\Livewire\Coupons;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Sales\Models\Coupon;

#[Access('sales_coupons_update')]
class UpdateCouponComponent extends FormRender
{
    public $formId = 'obelaw_sales_coupon_form';
    public $coupon = null;

    protected $pretitle = 'Coupons';
    protected $title = 'Create Update This Coupon';

    public function mount(Coupon $coupon)
    {
        $this->coupon = $coupon;

        $this->setInputs([
            'coupon_name' => $coupon->coupon_name,
            'coupon_code' => $coupon->coupon_code,
            'discount_type' => $coupon->discount_type,
            'discount_value' => $coupon->discount_value,
            'start_at' => $coupon->start_at,
            'ends_at' => $coupon->ends_at,
            'is_active' => $coupon->is_active,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        $this->coupon->update($validateData);

        return $this->pushAlert('success', 'The contact has been updated');
    }
}
