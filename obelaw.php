<?php

use Obelaw\Framework\Registrar;

Registrar::module(
    id: 'obelaw_accounting',
    root: __DIR__,
    info: [
        'name' => 'Accounting',
        'icon' => 'percentage',
        'href' => 'obelaw.accounting.home'
    ],
    navbar: [
        [
            'icon' => 'home-2',
            'label' => 'Home',
            'href' => 'obelaw.accounting.home'
        ],
        [
            'icon' => 'chart-bar',
            'label' => 'Chart Of Accounts',
            'href' => 'obelaw.accounting.coa.index'
        ],
        [
            'icon' => 'list',
            'label' => 'Entries',
            'href' => 'obelaw.accounting.entries.index'
        ]
    ],
);
