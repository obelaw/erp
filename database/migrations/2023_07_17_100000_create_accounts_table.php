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
        Schema::create($this->prefix . 'accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_account')->nullable()->constrained($this->prefix . 'accounts')->cascadeOnDelete();
            $table->string('name');
            $table->string('code')->unique();
            $table->string('type')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'accounts');
    }
};
