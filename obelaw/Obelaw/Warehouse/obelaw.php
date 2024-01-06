<?php

use Obelaw\Schema\BundleRegistrar;
use Obelaw\Warehouse\Providers\ObelawWarehouseServiceProvider;

BundleRegistrar::register(BundleRegistrar::MODULE, 'obelaw_warehouse', __DIR__, function ($config) {
    $config->setProvider(ObelawWarehouseServiceProvider::class);
});
