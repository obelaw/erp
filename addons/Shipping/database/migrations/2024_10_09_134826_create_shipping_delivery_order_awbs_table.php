<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Shipping\Lib\Enums\AWBState;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'shipping_delivery_order_awbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained($this->prefix . 'shipping_delivery_orders')->cascadeOnDelete();
            $table->smallInteger('state')->index()->default(AWBState::PREPARE);
            $table->string('awb');
            $table->string('courier_status')->nullable();
            $table->timestamp('cancel_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'shipping_delivery_order_awbs');
    }
};
