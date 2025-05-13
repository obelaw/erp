<?php

use Obelaw\Warehouse\WarehouseAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.flow.warehouse',
    WarehouseAddon::class,
    config('obelaw.flow.panels')
);
