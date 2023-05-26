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
        Schema::create('t_percobaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 100);
            $table->text('deskripsi')->nullable()->default('text');
            $table->tinyInteger('umur');
            $table->double('tinggi', 15, 8)->nullable()->default(123.4567);
            $table->decimal('berat', 5, 2)->nullable()->default(123.45);
            $table->date('tanggal_lahir')->nullable()->default(now());
            $table->dateTime('waktu_input')->nullable()->default(now());
            $table->tinyInteger('status');
            $table->enum('jenkel', ['Laki-laki', 'Perempuan'])->nullable()->default('Laki-laki');
            $table->longText('data_json')->nullable()->default('text');
            $table->binary('file_binary');
            $table->bigInteger('user_id')->nullable()->default(20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_percobaan');
    }
};
