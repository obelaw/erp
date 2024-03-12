<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Framework\Base\MigrationBase;
use Obelaw\Warehouse\Enums\TransferStatus;
use Obelaw\Warehouse\Enums\TransferType;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'warehouse_transfers', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('sourceable');
            $table->foreignId('inventory_from')->nullable()->constrained($this->prefix . 'warehousing_places')->cascadeOnDelete();
            $table->foreignId('inventory_to')->constrained($this->prefix . 'warehousing_places')->cascadeOnDelete();
            $table->smallInteger('type')->default(TransferType::TRANSFER)->index();
            $table->text('description')->nullable();
            $table->smallInteger('status')->default(TransferStatus::DRAFT)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'warehouse_transfers');
    }
};
