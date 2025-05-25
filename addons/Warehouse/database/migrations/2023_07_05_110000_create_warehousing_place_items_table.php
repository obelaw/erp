<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Warehouse\Enums\PlaceItemStatus;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'warehousing_place_items', function (Blueprint $table) {
            $table->id();
            $table->morphs('sourceable', 'sourceable_index');
            $table->foreignId('reference_id')->nullable()->constrained($this->prefix . 'warehousing_place_items')->cascadeOnDelete();
            $table->foreignId('place_id')->constrained($this->prefix . 'warehousing_places')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained($this->prefix . 'catalog_products')->cascadeOnDelete();
            $table->string('serial_number')->nullable()->index();
            $table->enum('type', ['consumable', 'storable'])->default('consumable')->index();
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
