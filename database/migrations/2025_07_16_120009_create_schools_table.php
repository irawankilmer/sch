<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('npsn');
            $table->enum('accreditation', ['A', 'B', 'C', 'Belum Terakreditasi'])->default('Belum Terakreditasi');
            $table->text('logo_url');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->enum('school_level', ['SMA', 'SMK', 'MA'])->default('SMK');
            $table->enum('status', ['Negeri', 'Swasta'])->default('Swasta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
