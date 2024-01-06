<?php

use Obelaw\Manufacturing\Providers\ObelawManufacturingServiceProvider;
use Obelaw\Schema\BundleRegistrar;

BundleRegistrar::register(BundleRegistrar::MODULE, 'obelaw_manufacturing', __DIR__, function ($config) {
    $config->setProvider(ObelawManufacturingServiceProvider::class);
});
