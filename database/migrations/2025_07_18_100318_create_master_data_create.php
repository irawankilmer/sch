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
        Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nama_sekolah');
            $table->string('npsn');
            $table->string('akreditasi');
            $table->text('logo_url');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('tingkat');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_sekolah');
    }
};
