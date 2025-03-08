<?php

use Obelaw\ERP\Addons\Audit\AuditAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.audit',
    AuditAddon::class
);
