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
        Schema::create($this->prefix . 'purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained($this->prefix . 'purchase_orders')->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained($this->prefix . 'catalog_products')->onDelete('set null');
            $table->decimal('item_price', 10, 2);
            $table->integer('item_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'purchase_order_items');
    }
};
