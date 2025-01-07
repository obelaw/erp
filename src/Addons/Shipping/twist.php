<?php

use Obelaw\ERP\Addons\Shipping\ShippingAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.shipping',
    ShippingAddon::class
);
