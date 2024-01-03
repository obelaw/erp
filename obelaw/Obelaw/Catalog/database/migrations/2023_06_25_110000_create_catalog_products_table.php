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
        Schema::create($this->prefix . 'catalog_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catagory_id')->nullable()->constrained($this->prefix . 'catalog_categories')->cascadeOnDelete();
            $table->integer('product_type')->default(1);
            $table->string('name');
            $table->string('sku')->unique()->index();
            $table->boolean('can_sold')->nullable();
            $table->boolean('can_purchased')->nullable();
            $table->boolean('in_pos')->nullable();
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
