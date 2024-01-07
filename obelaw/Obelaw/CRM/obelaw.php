<?php

use Obelaw\CRM\Providers\ObelawCRMServiceProvider;
use Obelaw\Schema\BundleRegistrar;

BundleRegistrar::register(BundleRegistrar::MODULE, 'obelaw_crm', __DIR__, function ($config) {
    $config->deactivate();
    $config->setProvider(ObelawCRMServiceProvider::class);
});
