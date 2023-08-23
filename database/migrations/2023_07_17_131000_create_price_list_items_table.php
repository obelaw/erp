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
        Schema::create($this->prefix . 'price_list_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_id')->constrained($this->prefix . 'price_lists')->cascadeOnDelete();
            $table->string('sku');
            $table->decimal('price', 10, 2);
            $table->unique(['list_id', 'sku']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'price_list_items');
    }
};
