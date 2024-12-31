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
        Schema::create($this->prefix . 'warehousing_place_item_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained($this->prefix . 'warehousing_place_items')->cascadeOnDelete();
            $table->smallInteger('record_move_type');
            $table->foreignId('record_source');
            $table->foreignId('record_destination');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'warehousing_place_item_logs');
    }
};
