<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Framework\Base\MigrationBase;
use Obelaw\Warehouse\Enums\TransferBundleStatus;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'warehouse_transfer_bundles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_id')->constrained($this->prefix . 'warehouse_transfers')->cascadeOnDelete();
            $table->foreignId('transfer_item_id')->constrained($this->prefix . 'warehouse_transfer_items')->cascadeOnDelete();
            $table->boolean('serialized')->nullable();
            $table->smallInteger('status')->default(TransferBundleStatus::DRAFT)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'warehouse_transfer_bundles');
    }
};