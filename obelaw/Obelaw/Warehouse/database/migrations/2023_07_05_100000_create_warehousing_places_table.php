<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Framework\Base\MigrationBase;
use Obelaw\Warehouse\Enums\PlaceType;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'warehousing_places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('place_id')->nullable()->constrained($this->prefix . 'warehousing_places')->cascadeOnDelete();
            $table->smallInteger('record_type')->default(PlaceType::WAREHOUSE);
            $table->string('name');
            $table->string('code')->index();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'warehousing_places');
    }
};