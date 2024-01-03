<?php

namespace Obelaw\Sales\Livewire\Coupons;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Sales\Models\Coupon;

#[Access('sales_coupons_update')]
class UpdateCouponComponent extends FormRender
{
    public $formId = 'obelaw_sales_coupon_form';

    protected $pretitle = 'Coupons';
    protected $title = 'Create Update This Coupon';

    public function mount(Coupon $coupon)
    {
        $this->coupon = $coupon;
        $this->coupon_name = $coupon->coupon_name;
        $this->coupon_code = $coupon->coupon_code;
        $this->discount_type = $coupon->discount_type;
        $this->discount_value = $coupon->discount_value;
        $this->start_at = $coupon->start_at;
        $this->ends_at = $coupon->ends_at;
        $this->is_active = $coupon->is_active;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $this->coupon->update($validateData);

        return $this->pushAlert('success', 'The contact has been updated');
    }
}
