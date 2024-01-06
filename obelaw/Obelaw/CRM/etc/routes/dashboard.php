<?php

use Illuminate\Support\Facades\Route;
use Obelaw\CRM\Livewire\HomeLeadComponent;
use Obelaw\CRM\Livewire\Leads\CreateLeadComponent;
use Obelaw\CRM\Livewire\Leads\IndexLeadsComponent;
use Obelaw\CRM\Livewire\Leads\ShowLeadComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::prefix('crm')->group(function () {
    Route::get('/', HomeLeadComponent::class)->name('obelaw.crm.home');

    Route::prefix('leads')->group(function () {
        Route::get('/', IndexLeadsComponent::class)->name('obelaw.crm.leads.index');
        Route::get('/create', CreateLeadComponent::class)->name('obelaw.crm.leads.create');
        Route::get('/{lead}', ShowLeadComponent::class)->name('obelaw.crm.leads.show');
    });
});
