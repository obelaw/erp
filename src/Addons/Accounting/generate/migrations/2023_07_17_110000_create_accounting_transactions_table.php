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
        Schema::create($this->prefix . 'accounting_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('posted_by')->nullable()->constrained($this->prefix . 'permit_users')->nullOnDelete();
            $table->text('description')->nullable();
            $table->date('added_at');
            $table->dateTime(column: 'posted_at')->nullable();
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
