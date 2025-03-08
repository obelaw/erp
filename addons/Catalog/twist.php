<?php

use Obelaw\ERP\Addons\Catalog\CatalogAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.catalog',
    CatalogAddon::class
);
