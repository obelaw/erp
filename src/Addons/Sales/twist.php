<?php

use Obelaw\ERP\Addons\Sales\SalesAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.sales',
    SalesAddon::class
);
