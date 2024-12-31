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
        Schema::create($this->prefix . 'purchase_receive_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receive_id')->constrained($this->prefix . 'purchase_receives')->cascadeOnDelete();
            $table->foreignId('order_item_id')->nullable()->constrained($this->prefix . 'purchasing_purchase_order_items')->cascadeOnDelete();
            $table->integer('received_quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'purchase_receive_items');
    }
};
