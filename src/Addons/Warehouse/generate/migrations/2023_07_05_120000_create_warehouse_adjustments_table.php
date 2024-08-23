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
        Schema::create($this->prefix . 'warehouse_adjustments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->constrained($this->prefix . 'warehousing_places')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained($this->prefix . 'catalog_products')->cascadeOnDelete();
            $table->bigInteger('quantity')->index();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'warehouse_adjustments');
    }
};