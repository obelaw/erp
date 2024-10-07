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
        Schema::create($this->prefix . 'shipping_courier_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courier_id')->constrained($this->prefix . 'shipping_couriers')->cascadeOnDelete();
            $table->string('name');
            $table->json('credentials');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'shipping_courier_accounts');
    }
};
