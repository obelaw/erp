<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'customer_journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained($this->prefix . 'contacts')->cascadeOnDelete();
            $table->foreignId('account_receivable')->nullable()->constrained($this->prefix . 'accounting_accounts')->nullOnDelete();
            $table->foreignId('account_payable')->nullable()->constrained($this->prefix . 'accounting_accounts')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'customer_journals');
    }
};
