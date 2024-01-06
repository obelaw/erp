<?php

use Obelaw\Schema\BundleRegistrar;
use Obelaw\Serialization\Providers\ObelawSerializationServiceProvider;

BundleRegistrar::register(BundleRegistrar::MODULE, 'obelaw_serialization', __DIR__, function ($config) {
    $config->setProvider(ObelawSerializationServiceProvider::class);
});
