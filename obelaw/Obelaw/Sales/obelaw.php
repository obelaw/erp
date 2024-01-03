<?php

use Obelaw\Sales\Providers\ObelawSalesServiceProvider;
use Obelaw\Schema\BundleRegistrar;

BundleRegistrar::register(BundleRegistrar::MODULE, 'obelaw_sales', __DIR__, function ($config) {
    $config->setProvider(ObelawSalesServiceProvider::class);
});
