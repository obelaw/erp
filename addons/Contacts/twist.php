<?php

use Obelaw\ERP\Addons\Contacts\ContactsAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.contacts',
    ContactsAddon::class
);
