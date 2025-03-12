<?php

use Obelaw\Sales\SalesAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.sales',
    SalesAddon::class
);
