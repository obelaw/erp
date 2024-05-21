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
        Schema::create($this->prefix . 'account_entry_amounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained($this->prefix . 'accounts')->cascadeOnDelete();
            $table->foreignId('entry_id')->constrained($this->prefix . 'account_entries')->cascadeOnDelete();
            $table->enum('type', ['debit', 'credit']);
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'account_entry_amounts');
    }
};
