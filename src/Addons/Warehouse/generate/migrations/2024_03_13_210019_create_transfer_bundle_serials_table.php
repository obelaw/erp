<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Framework\Base\MigrationBase;
use Obelaw\Warehouse\Enums\TransferBundleSerialStatus;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'warehouse_transfer_bundle_serials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bundle_id')->index()->constrained($this->prefix . 'warehouse_transfer_bundles')->cascadeOnDelete();
            $table->foreignId('item_id')->index()->constrained($this->prefix . 'warehousing_place_items')->cascadeOnDelete();
            $table->smallInteger('status')->default(TransferBundleSerialStatus::PENDING)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'warehouse_transfer_bundle_serials');
    }
};
