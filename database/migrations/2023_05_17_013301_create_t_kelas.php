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
        Schema::create('t_kelas', function (Blueprint $table) {
            $table->string('nama_kelas', 100)->nullable()->default('text');
            $table->string('jurusan', 100)->nullable()->default('text');
            $table->string('lokasi_ruangan', 100)->nullable()->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_kelas');
    }
};
