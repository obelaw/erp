<?php

use Obelaw\Twist\Base\BaseMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table($this->prefix . 'sales_flat_orders', function (Blueprint $table) {
            $table->foreignId('sale_place_id')->nullable()->after('address_id')->constrained($this->prefix . 'warehousing_places')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table($this->prefix . 'sales_flat_orders', function (Blueprint $table) {
            $table->dropForeign(['sale_place_id']);
            $table->dropColumn('sale_place_id');
        });
    }
};
