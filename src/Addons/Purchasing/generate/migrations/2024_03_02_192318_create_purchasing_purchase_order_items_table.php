<?php

use Obelaw\Twist\Base\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'purchasing_purchase_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained($this->prefix . 'purchasing_purchase_orders')->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained($this->prefix . 'catalog_products')->onDelete('set null');
            $table->integer('quantity')->default(1);
            $table->decimal('item_price', 10, 2);
            $table->decimal('row_total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'purchasing_purchase_order_items');
    }
};
