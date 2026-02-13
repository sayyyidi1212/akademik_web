<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('NIM', 15)->primary();
            $table->string('Nama', 100);
            $table->text('Alamat')->nullable();
            $table->string('Nohp', 15)->nullable();
            $table->integer('Semester')->nullable();
            $table->string('id_Gol', 10)->nullable();

            $table->foreign('id_Gol')->references('id_Gol')->on('golongan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
