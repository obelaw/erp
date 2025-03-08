<?php

use Obelaw\ERP\Addons\Purchasing\PurchasingAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.purchasing',
    PurchasingAddon::class
);
