<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Purchasing\Lib\Enums\ReceiveStatus;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'purchase_receives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained($this->prefix . 'purchasing_purchase_orders')->cascadeOnDelete();
            $table->smallInteger('status')->default(ReceiveStatus::DRAFT)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'purchase_receives');
    }
};
