<?php

use Obelaw\Framework\Base\MigrationBase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'sales_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained($this->prefix . 'contacts')->cascadeOnDelete();
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
        Schema::dropIfExists($this->prefix . 'sales_orders');
    }
};
