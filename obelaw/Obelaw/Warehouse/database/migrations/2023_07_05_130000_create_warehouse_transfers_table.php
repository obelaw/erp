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
        Schema::create($this->prefix . 'warehouse_transfers', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('adjustment_id')->nullable()->constrained($this->prefix . 'warehouse_adjustments')->cascadeOnDelete();
            $table->nullableMorphs('sourceable');
            $table->foreignId('inventory_from')->nullable()->constrained($this->prefix . 'warehouse_inventories')->cascadeOnDelete();
            $table->foreignId('inventory_to')->constrained($this->prefix . 'warehouse_inventories')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained($this->prefix . 'catalog_products')->cascadeOnDelete();
            $table->string('type', 16)->nullable()->index();
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
        Schema::dropIfExists($this->prefix . 'warehouse_transfers');
    }
};
