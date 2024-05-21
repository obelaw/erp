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
        Schema::create($this->prefix . 'accounting_bill_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bill_id')->constrained($this->prefix . 'accounting_bills')->cascadeOnDelete();
            $table->string('item_name');
            $table->string('item_sku');
            $table->decimal('item_price', 10, 2);
            $table->integer('item_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'accounting_bill_items');
    }
};
