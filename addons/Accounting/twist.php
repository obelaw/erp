<?php

use Obelaw\ERP\Addons\Accounting\AccountingAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.accounting',
    AccountingAddon::class
);
