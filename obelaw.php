<?php

use Obelaw\Accounting\ObelawAccountingServiceProvider;
use Obelaw\Accounting\RepositoryServiceProvider;
use Obelaw\Schema\BundleRegistrar;

BundleRegistrar::register(BundleRegistrar::MODULE, 'obelaw_accounting', __DIR__, function ($config) {
    $config->setProvider(ObelawAccountingServiceProvider::class);
    $config->setProvider(RepositoryServiceProvider::class);
});
