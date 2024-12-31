<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\ERP\Addons\Contacts\Lib\Enums\ContactType;
use Obelaw\Twist\Base\BaseMigration;

return new class extends BaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'contacts', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('document_type')->default(ContactType::customer);
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'contacts');
    }
};
