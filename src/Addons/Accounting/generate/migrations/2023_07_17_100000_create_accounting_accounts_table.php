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
        Schema::create($this->prefix . 'accounting_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained($this->prefix . 'accounting_account_types')->cascadeOnDelete();
            $table->string('code')->unique();
            $table->string('name');
            $table->decimal('opening_balance', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'accounting_accounts');
    }
};
