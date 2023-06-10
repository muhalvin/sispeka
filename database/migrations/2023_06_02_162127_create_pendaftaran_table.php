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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('nama_pengantin_lk')->nullable();
            $table->string('nama_pengantin_pr')->nullable();
            $table->integer('umur_lk')->nullable();
            $table->integer('umur_pr')->nullable();
            $table->string('ktp_lk')->nullable();
            $table->string('ktp_pr')->nullable();
            $table->string('ijasah_lk')->nullable();
            $table->string('ijasah_pr')->nullable();
            $table->string('akta_lk')->nullable();
            $table->string('akta_pr')->nullable();
            $table->string('surat_pengantar')->nullable();
            $table->string('surat_asal_lk')->nullable();
            $table->string('surat_asal_pr')->nullable();
            $table->string('surat_persetujuan_ortu_lk')->nullable();
            $table->string('surat_persetujuan_ortu_pr')->nullable();
            $table->string('surat_izin_ortu_pr')->nullable()->nullable();
            $table->string('ktp_wali')->nullable();
            $table->string('fc_kutipan_akta')->nullable();
            $table->string('surat_pernyataan_status')->nullable();
            $table->string('foto_pengantin_lk')->nullable();
            $table->string('foto_pengantin_pr')->nullable();
            $table->string('surat_dispen')->nullable();
            $table->string('akta_cerai')->nullable();
            $table->enum('status',['1', '2', '3'])->nullable();
            $table->date('tanggal_pilihan')->nullable();
            $table->string('pesan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};