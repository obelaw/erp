<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Framework\Base\MigrationBase;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'sales_flat_order_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained($this->prefix . 'sales_flat_orders')->cascadeOnDelete();
            $table->foreignId('country_id')->constrained($this->prefix . 'contacts_pins')->cascadeOnDelete();
            $table->foreignId('city_id')->constrained($this->prefix . 'contacts_pins')->cascadeOnDelete();
            $table->foreignId('state_id')->nullable()->constrained($this->prefix . 'contacts_pins')->cascadeOnDelete();
            $table->foreignId('area_id')->nullable()->constrained($this->prefix . 'contacts_pins')->cascadeOnDelete();
            $table->integer('postcode')->nullable();
            $table->string('street_line_1');
            $table->string('street_line_2')->nullable();
            $table->string('phone_number')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'sales_flat_order_addresses');
    }
};
