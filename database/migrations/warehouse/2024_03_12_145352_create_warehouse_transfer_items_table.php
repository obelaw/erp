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
        Schema::create($this->prefix . 'warehouse_transfer_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_id')->constrained($this->prefix . 'warehouse_transfers')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained($this->prefix . 'catalog_products')->cascadeOnDelete();
            $table->bigInteger('quantity')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'warehouse_transfer_items');
    }
};
