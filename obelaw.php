<?php

use Obelaw\Framework\Registrar;

Registrar::module(
    id: 'obelaw_accounting',
    info: [
        'name' => 'Accounting',
        'icon' => 'percentage',
        'href' => 'obelaw.accounting.home'
    ],
    navbar: [
        [
            'icon' => 'home-2',
            'label' => 'Home',
            'href' => 'obelaw.catalog.home'
        ],
        [
            'icon' => 'chart-bar',
            'label' => 'Chart Of Accounts',
            'href' => 'obelaw.accounting.coa.index'
        ]
    ],
);
