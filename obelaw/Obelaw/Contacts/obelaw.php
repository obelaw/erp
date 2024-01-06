<?php

use Obelaw\Contacts\Providers\ObelawContactsServiceProvider;
use Obelaw\Schema\BundleRegistrar;

BundleRegistrar::register(BundleRegistrar::MODULE, 'obelaw_helper_contacts', __DIR__, function ($config) {
    $config->setProvider(ObelawContactsServiceProvider::class);
});
