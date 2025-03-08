<?php

use Obelaw\ERP\Addons\Warehouse\WarehouseAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.warehouse',
    WarehouseAddon::class
);
