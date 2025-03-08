<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\ERP\Addons\Catalog\Enums\ProductType;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'catalog_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catagory_id')->nullable()->constrained($this->prefix . 'catalog_categories')->cascadeOnDelete();
            $table->integer('product_type')->default(ProductType::CONSUMABLE);
            $table->integer('product_scope');
            $table->string('name');
            $table->string('sku')->unique()->index();
            $table->boolean('can_sold')->nullable();
            $table->boolean('can_purchased')->nullable();
            $table->decimal('price_sales', 10, 2)->nullable(); //default = 0
            $table->decimal('price_purchase', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'catalog_products');
    }
};
