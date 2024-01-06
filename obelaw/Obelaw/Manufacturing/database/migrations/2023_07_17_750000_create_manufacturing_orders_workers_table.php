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
        Schema::create($this->prefix . 'manufacturing_order_workers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained($this->prefix . 'manufacturing_orders')->cascadeOnDelete();
            $table->foreignId('worker_id')->nullable()->constrained($this->prefix . 'manufacturing_workers')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'manufacturing_order_workers');
    }
};
