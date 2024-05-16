<?php

use Illuminate\Support\Facades\Route;
use Obelaw\Sales\Livewire\Coupons\CreateCouponComponent;
use Obelaw\Sales\Livewire\Coupons\IndexCouponsComponent;
use Obelaw\Sales\Livewire\Coupons\UpdateCouponComponent;
use Obelaw\Sales\Livewire\Customers\CreateCustomerComponent;
use Obelaw\Sales\Livewire\Customers\IndexCustomersComponent;
use Obelaw\Sales\Livewire\Customers\UpdateCustomerComponent;
use Obelaw\Sales\Livewire\HomeComponent;
use Obelaw\Sales\Livewire\Invoices\IndexInvoicesComponent;
use Obelaw\Sales\Livewire\Invoices\OpenInvoicesComponent;
use Obelaw\Sales\Livewire\Invoices\ShowInvoiceComponent;
use Obelaw\Sales\Livewire\Reporting\SalesAnalysisReporting;
use Obelaw\Sales\Livewire\SalesOrder\CreateSalesOrder;
use Obelaw\Sales\Livewire\SalesOrder\CreateSalesOrderComponent;
use Obelaw\Sales\Livewire\SalesOrder\IndexCreateSalesComponent;
use Obelaw\Sales\Livewire\SalesOrder\ShowSalesOrderComponent;

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

Route::prefix('sales')->group(function () {
    Route::get('/', HomeComponent::class)->name('obelaw.sales.home');

    // sales order
    Route::prefix('sales-order')->group(function () {
        Route::get('/', IndexCreateSalesComponent::class)->name('obelaw.sales.sales-order.index');
        Route::get('/create', CreateSalesOrderComponent::class)->name('obelaw.sales.sales-order.draft.create');
        Route::get('/{orderId}/create', CreateSalesOrder::class)->name('obelaw.sales.sales-order.create');
        Route::get('/{order}/open', ShowSalesOrderComponent::class)->name('obelaw.sales.sales-order.open');
    });

    Route::prefix('invoices')->group(function () {
        Route::get('/', IndexInvoicesComponent::class)->name('obelaw.sales.invoices.index');
        Route::get('/{invoice}/open', ShowInvoiceComponent::class)->name('obelaw.sales.invoices.open');
    });

    Route::prefix('customers')->group(function () {
        Route::get('/', IndexCustomersComponent::class)->name('obelaw.sales.customers.index');
        Route::get('/create', CreateCustomerComponent::class)->name('obelaw.sales.customers.create');
        Route::get('/{customer}/update', UpdateCustomerComponent::class)->name('obelaw.sales.customers.update');
    });

    Route::prefix('coupons')->group(function () {
        Route::get('/', IndexCouponsComponent::class)->name('obelaw.sales.coupons.index');
        Route::get('/create', CreateCouponComponent::class)->name('obelaw.sales.coupons.create');
        Route::get('/{coupon}/update', UpdateCouponComponent::class)->name('obelaw.sales.coupons.update');
    });

    // Reporting
    Route::prefix('reporting')->group(function () {
        Route::get('/sales-analysis', SalesAnalysisReporting::class)->name('obelaw.sales.reporting.sales-analysis');
    });
});
