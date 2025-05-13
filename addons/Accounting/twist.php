<?php

use Obelaw\Accounting\AccountingAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.flow.accounting',
    AccountingAddon::class,
    config('obelaw.flow.panels')
);
