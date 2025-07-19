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
        Schema::create('tahun_ajaran', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('tahun_ajaran')->unique();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::create('semester', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->ulid('tahun_ajaran_id');
            $table->string('semester');
            $table->enum('periode', ['Ganjil', 'Genap'])->default('ganjil');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajaran')->onDelete('cascade');
        });


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

        Schema::create('jurusan', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nama_jurusan')->unique();
            $table->string('singkatan')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahun_ajaran');
        Schema::dropIfExists('semester');
        Schema::dropIfExists('profil_sekolah');
        Schema::dropIfExists('jurusan');
    }
};
