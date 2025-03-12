<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Warehouse\Enums\TransferBundleSerialStatus;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
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
