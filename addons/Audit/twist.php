<?php

use Obelaw\Audit\AuditAddon;

\Obelaw\Twist\Addons\AddonRegistrar::register(
    'obelaw.erp.audit',
    AuditAddon::class
);
