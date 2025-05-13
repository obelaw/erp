<?php

use Obelaw\Purchasing\PurchasingAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.flow.purchasing',
    PurchasingAddon::class,
    config('obelaw.flow.panels')
);
