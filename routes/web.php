<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Accounting\Http\Controllers\HomeController;

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

Route::prefix('accounting')->group(function () {
    Route::get('/', HomeController::class)->name('obelaw.accounting.home');
});
