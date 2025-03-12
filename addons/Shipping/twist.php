<?php

use Obelaw\Shipping\ShippingAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.shipping',
    ShippingAddon::class
);
