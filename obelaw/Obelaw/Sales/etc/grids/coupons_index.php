<?php

use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Sales\Models\Coupon;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Coupon::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Coupon',
            route: 'obelaw.sales.coupons.create',
            permission: 'sales_coupons_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Coupon name', 'coupon_name')
            ->setColumn('Coupon code', 'coupon_code')
            ->setColumn('Type', 'discount_type')
            ->setColumn('Value', 'discount_value');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Edit', new RouteAction(
            href: 'obelaw.sales.coupons.update',
            permission: 'sales_coupons_update',
        ));
    }
};
