<?php

use Obelaw\Accounting\AccountingAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.accounting',
    AccountingAddon::class
);
