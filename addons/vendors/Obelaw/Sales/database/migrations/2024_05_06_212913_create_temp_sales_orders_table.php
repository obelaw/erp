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
        Schema::create($this->prefix . 'temp_sales_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained($this->prefix . 'admins')->cascadeOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained($this->prefix . 'contacts')->cascadeOnDelete();
            $table->foreignId('address_id')->nullable()->constrained($this->prefix . 'contacts_addresses')->cascadeOnDelete();
            $table->string('coupon_code')->nullable();

            // payment methods
            $table->foreignId('payment_method_id')->nullable()->constrained($this->prefix . 'payment_methods')->nullOnDelete();
            $table->string('payment_method_reference')->nullable()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'temp_sales_orders');
    }
};
