<?php

use Obelaw\Accounting\Providers\ObelawAccountingServiceProvider;
use Obelaw\Accounting\Providers\RepositoryServiceProvider;
use Obelaw\Schema\BundleRegistrar;

BundleRegistrar::register(BundleRegistrar::MODULE, 'obelaw_accounting', __DIR__, function ($config) {
    $config->setProvider(ObelawAccountingServiceProvider::class);
    $config->setProvider(RepositoryServiceProvider::class);
});
