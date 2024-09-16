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
        Schema::create($this->prefix . 'accounting_pricelist_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_id')->constrained($this->prefix . 'accounting_pricelists')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained($this->prefix . 'catalog_products')->cascadeOnDelete();
            $table->decimal('price', 10, 2);
            $table->unique(['list_id', 'product_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'accounting_pricelist_items');
    }
};
