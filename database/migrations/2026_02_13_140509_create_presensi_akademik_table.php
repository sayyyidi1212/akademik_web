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
        Schema::create('presensi_akademik', function (Blueprint $table) {
            $table->id('id_presensi');
            $table->string('hari', 10)->nullable();
            $table->date('tanggal')->nullable();
            $table->string('status_kehadiran', 20)->nullable();
            $table->string('NIM', 15)->nullable();
            $table->string('Kode_mk', 10)->nullable();

            $table->foreign('NIM')->references('NIM')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('Kode_mk')->references('Kode_mk')->on('matakuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_akademik');
    }
};
