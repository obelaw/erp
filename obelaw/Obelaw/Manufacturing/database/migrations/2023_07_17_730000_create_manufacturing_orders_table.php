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
        Schema::create($this->prefix . 'manufacturing_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('product_id')->constrained($this->prefix . 'catalog_products')->cascadeOnDelete();

            if (Schema::hasTable($this->prefix . 'warehouse_inventories'))
                $table->foreignId('inventory_id')->nullable()->constrained($this->prefix . 'warehouse_inventories')->nullOnDelete();

            $table->integer('quantity')->default(1);
            $table->date('start_at');
            $table->date('end_at')->nullable();
            $table->enum('status', ['padding', 'running', 'pause', 'complete'])->default('padding')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'manufacturing_orders');
    }
};
