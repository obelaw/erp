<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\ERP\Addons\Purchasing\Lib\Enums\POStatusEnum;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'purchasing_purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained($this->prefix . 'contacts')->cascadeOnDelete();
            $table->foreignId('payment_term_id')->nullable()->constrained($this->prefix . 'purchasing_payment_terms')->cascadeOnDelete();
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('tax_total', 10, 2)->nullable();
            $table->decimal('grand_total', 10, 2)->nullable();
            $table->smallInteger('status')->default(POStatusEnum::QUOTATION)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'purchasing_purchase_orders');
    }
};
