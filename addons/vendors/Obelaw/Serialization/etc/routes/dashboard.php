<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Serialization\Livewire\HomeComponent;

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

Route::prefix('serialization')->group(function () {
    Route::get('/', HomeComponent::class)->name('obelaw.serialization.home');
});
