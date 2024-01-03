<?php

use Obelaw\Catalog\Providers\ObelawCatalogServiceProvider;
use Obelaw\Schema\BundleRegistrar;

BundleRegistrar::register(BundleRegistrar::MODULE, 'obelaw_catalog', __DIR__, function ($config) {
    $config->setProvider(ObelawCatalogServiceProvider::class);
});
