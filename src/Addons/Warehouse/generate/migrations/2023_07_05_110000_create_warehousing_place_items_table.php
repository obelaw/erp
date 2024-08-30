<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\ERP\Addons\Warehouse\Enums\PlaceItemStatus;
use Obelaw\Framework\Base\MigrationBase;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'warehousing_place_items', function (Blueprint $table) {
            $table->id();
            $table->morphs('sourceable', 'sourceable_index');
            $table->foreignId('place_id')->constrained($this->prefix . 'warehousing_places')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained($this->prefix . 'catalog_products')->cascadeOnDelete();
            $table->bigInteger('quantity')->default(1)->index();
            $table->smallInteger('status')->default(PlaceItemStatus::IN)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'warehousing_place_items');
    }
};
