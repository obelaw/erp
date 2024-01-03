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
        Schema::create($this->prefix . 'payments', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['send', 'receive']);
            $table->foreignId('vendor_id')->constrained($this->prefix . 'vendors')->cascadeOnDelete();
            $table->foreignId('entry_id')->nullable()->constrained($this->prefix . 'account_entries')->cascadeOnDelete();
            $table->foreignId('payment_method_id')->nullable()->constrained($this->prefix . 'payment_methods')->cascadeOnDelete();
            $table->decimal('amount', 10, 2);
            $table->text('notes')->nullable();
            $table->date('due_date')->index();
            $table->boolean('collected')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'payments');
    }
};
