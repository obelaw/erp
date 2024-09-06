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
        Schema::create($this->prefix . 'accounting_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('approve_by')->nullable()->constrained('permit_users')->nullOnDelete();
            $table->text('description')->nullable();
            $table->date('approve_at')->nullable();
            $table->date('added_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'accounting_transactions');
    }
};
