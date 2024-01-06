<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Contacts\Livewire\Addresses\CreateAddressesComponent;
use Obelaw\Contacts\Livewire\Addresses\IndexAddressesComponent;
use Obelaw\Contacts\Livewire\Contacts\CreateContactComponent;
use Obelaw\Contacts\Livewire\Contacts\IndexContactsComponent;

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

Route::prefix('contacts')->group(function () {
    Route::get('/', function () {
        return view('obelaw-contacts::home');
    })->name('obelaw.contacts.home');

    // Categories
    Route::prefix('contacts')->group(function () {
        Route::get('/', IndexContactsComponent::class)->name('obelaw.contacts.contacts.list');
        Route::get('/create', CreateContactComponent::class)->name('obelaw.contacts.contacts.create');
    });

    Route::prefix('addresses')->group(function () {
        Route::get('/', IndexAddressesComponent::class)->name('obelaw.contacts.addresses.list');
        Route::get('/create', CreateAddressesComponent::class)->name('obelaw.contacts.addresses.create');
    });
});
