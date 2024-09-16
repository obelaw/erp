<?php

use Obelaw\Twist\Base\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'sales_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained($this->prefix . 'sales_flat_orders')->cascadeOnDelete();
            $table->foreignId('transaction_id')->nullable()->constrained($this->prefix . 'accounting_transactions')->cascadeOnDelete();
            $table->enum('status', ['draft', 'post', 'posted'])->default('draft');
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
