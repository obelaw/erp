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
        Schema::create($this->prefix . 'sales_order_cancel_reasons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::table($this->prefix . 'sales_flat_orders', function ($table) {
            $table->foreignId('reason_id')->after('salesperson_id')->nullable()->constrained($this->prefix . 'sales_order_cancel_reasons')->nullOnDelete();
            $table->timestamp('cancel_at')->after('grand_total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table($this->prefix . 'sales_flat_orders', function ($table) {
            $table->dropForeign(['reason_id']);
            $table->dropColumn(['reason_id', 'cancel_at']);
        });

        Schema::dropIfExists($this->prefix . 'sales_order_cancel_reasons');
    }
};
