<?php

use Obelaw\Framework\Base\MigrationBase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'contacts_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')->constrained($this->prefix . 'contacts')->cascadeOnDelete();
            $table->string('label');
            $table->string('country_code', 2)->index()->nullable();
            $table->integer('city_id')->index()->nullable();
            $table->integer('postcode')->nullable();
            $table->string('street_line_1');
            $table->string('street_line_2')->nullable();
            $table->string('phone_number')->index();
            $table->boolean('is_main')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'contacts_addresses');
    }
};
