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
        Schema::create($this->prefix . 'catalog_variants', function (Blueprint $table) {
            $table->id();
            $table->integer('product_type')->default(1)->index();
            $table->integer('unit_measure')->default(1)->index();
            $table->string('name');
            $table->text('description')->nullabel();
            $table->decimal('cost', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'catalog_variants');
    }
};
