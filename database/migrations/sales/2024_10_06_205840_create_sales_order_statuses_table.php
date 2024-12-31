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
        Schema::create($this->prefix . 'sales_order_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table($this->prefix . 'sales_flat_orders', function ($table) {
            $table->foreignId('status_id')->after('id')->nullable()->constrained($this->prefix . 'sales_order_statuses')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table($this->prefix . 'sales_flat_orders', function ($table) {
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
        });

        Schema::dropIfExists($this->prefix . 'sales_order_statuses');
    }
};
