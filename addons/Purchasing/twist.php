<?php

use Obelaw\Purchasing\PurchasingAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.purchasing',
    PurchasingAddon::class
);
