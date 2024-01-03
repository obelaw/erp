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
        Schema::create($this->prefix . 'sales_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entry_id')->constrained($this->prefix . 'account_entries')->cascadeOnDelete();
            $table->foreignId('order_id')->constrained($this->prefix . 'sales_orders')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'sales_invoices');
    }
};
