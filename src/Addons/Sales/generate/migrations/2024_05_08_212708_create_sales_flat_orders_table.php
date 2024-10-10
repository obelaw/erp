<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'sales_flat_orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('salesperson_id')->nullable()->constrained($this->prefix . 'permit_users')->nullOnDelete();

            // customer
            $table->foreignId('customer_id')->nullable()->constrained($this->prefix . 'contacts')->nullOnDelete();
            $table->foreignId('address_id')->nullable()->constrained($this->prefix . 'contacts_addresses')->nullOnDelete();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();

            // payment methods
            $table->foreignId('payment_method_id')->nullable()->constrained($this->prefix . 'accounting_payment_methods')->nullOnDelete();
            $table->string('payment_method_reference')->nullable()->index();

            // totals
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('discount_total', 10, 2)->nullable();
            $table->decimal('shipping_total', 10, 2)->nullable();
            $table->decimal('tax_total', 10, 2)->nullable();
            $table->decimal('grand_total', 10, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'sales_flat_orders');
    }
};
