<?php

use Obelaw\Accounting\Http\Controllers\HomeController;
use Obelaw\Accounting\Http\Livewire\COA\CreateComponent;
use Obelaw\Accounting\Http\Livewire\COA\IndexComponent;
use Obelaw\Accounting\Http\Livewire\Entries\CreateEntryComponent;
use Obelaw\Accounting\Http\Livewire\Entries\IndexEntriesComponent;
use Obelaw\Framework\Registrar;

Registrar::module(
    id: 'obelaw_accounting',
    root: __DIR__,
    info: [
        'name' => 'Accounting',
        'icon' => 'percentage',
        'href' => 'obelaw.accounting.home',
        'slug' => 'accounting',
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
    routes: [
        'home' => HomeController::class,
        'coa' => [
            'index' => IndexComponent::class,
            'create' => CreateComponent::class,
        ],
        'entries' => [
            'index' => IndexEntriesComponent::class,
            'create' => CreateEntryComponent::class,
        ]
    ],
);
