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
        Schema::create($this->prefix . 'crm_leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id')->constrained($this->prefix . 'admins')->cascadeOnDelete();
            $table->foreignId('assigned_id')->constrained($this->prefix . 'admins')->cascadeOnDelete();
            $table->foreignId('contact_id')->constrained($this->prefix . 'contacts_list')->cascadeOnDelete();
            $table->enum('status', ['new', 'becoming', 'offer', 'done'])->default('new')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'crm_leads');
    }
};
