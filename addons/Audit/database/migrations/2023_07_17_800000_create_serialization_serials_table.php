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
        Schema::create($this->prefix . 'serialization_serials', function (Blueprint $table) {
            $table->id();
            $table->morphs('recordable');
            $table->year('year')->index();
            $table->string('sequence')->index();
            $table->string('serial', 32)->unique()->index();
            $table->ulid('ulid')->unique()->index();
            $table->string('barcode', 16)->unique()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'serialization_serials');
    }
};
