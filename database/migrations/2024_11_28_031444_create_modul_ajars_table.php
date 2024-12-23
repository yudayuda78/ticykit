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
        Schema::create('modul_ajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('slug')->unique();
            $table->string('namaModul');
            $table->string('kodeModul');
            $table->string('penyusun');
            $table->string('tahun');
            $table->string('kelas');
            $table->string('faseCapaian');
            $table->string('elemen');
            $table->string('alokasiWaktu');
            $table->string('pertemuan');
            $table->string('profilPelajarPancasila');
            $table->string('saranaPrasarana');
            $table->string('targetPesertaDidik');
            $table->string('modelPembelajaran');
            $table->string('modePembelajaran');
            $table->string('tujuanPembelajaran');
            $table->string('pertanyaanPemantik');
            $table->string('persiapanPembelajaran');
            $table->string('pendahuluan');
            $table->string('waktuPendahuluan');
            $table->string('kegiatanInti');
            $table->string('waktuKegiatanInti');
            $table->string('kegiatanPenutup');
            $table->string('waktuKegiatanPenutup');
            $table->string('rencanaAsesmen');
            $table->string('bahanBacaan');
            $table->string('kota');
            $table->string('tanggal');
            $table->string('kepalasekolah');
            $table->string('guru');
            $table->string('namaKepalaSekolah');
            $table->string('namaGuru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_ajars');
    }
};
