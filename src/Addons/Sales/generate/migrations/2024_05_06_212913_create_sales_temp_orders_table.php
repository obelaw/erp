<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Framework\Base\MigrationBase;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'sales_temp_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('permit_users')->cascadeOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained($this->prefix . 'contacts')->cascadeOnDelete();
            $table->foreignId('address_id')->nullable()->constrained($this->prefix . 'contacts_addresses')->cascadeOnDelete();
            $table->string('coupon_code')->nullable();

            // payment methods
            $table->foreignId('payment_method_id')->nullable()->constrained($this->prefix . 'accounting_payment_methods')->nullOnDelete();
            $table->string('payment_method_reference')->nullable()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'sales_temp_orders');
    }
};
