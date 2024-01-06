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
        Schema::create($this->prefix . 'warehouse_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warehouse_id')->constrained($this->prefix . 'warehouse_warehouses')->cascadeOnDelete();
            $table->string('name');
            $table->string('code')->index();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->boolean('has_products')->nullable();
            $table->boolean('has_variants')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'warehouse_inventories');
    }
};
