<?php

use Obelaw\Sales\SalesAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.flow.sales',
    SalesAddon::class,
    config('obelaw.flow.panels')
);
