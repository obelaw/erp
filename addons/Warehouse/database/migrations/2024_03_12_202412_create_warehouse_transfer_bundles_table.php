<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\ERP\Addons\Warehouse\Enums\TransferBundleStatus;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
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
