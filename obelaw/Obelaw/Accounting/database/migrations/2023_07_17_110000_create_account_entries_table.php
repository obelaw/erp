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
        Schema::create($this->prefix . 'account_entries', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('credit_account_id')->constrained($this->prefix . 'accounts')->cascadeOnDelete();
            // $table->foreignId('debit_account_id')->constrained($this->prefix . 'accounts')->cascadeOnDelete();
            // $table->enum('type', ['credit', 'debit']);
            // $table->decimal('amount', 10, 2);
            $table->text('description')->nullable();
            $table->date('added_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'account_entries');
    }
};
