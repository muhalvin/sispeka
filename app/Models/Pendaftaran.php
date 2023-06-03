<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pendaftaran extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_pengantin_lk',
        'nama_pengantin_pr',
        'umur_lk',
        'umur_pr',
        'umur_pr',
        'ktp_lk',
        'ktp_pr',
        'ijasah_lk',
        'ijasah_pr',
        'akta_lk',
        'akta_pr',
        'surat_pengantar',
        'surat_asal_lk',
        'surat_asal_pr',
        'surat_persetujuan_ortu_lk',
        'surat_persetujuan_ortu_pr',
        'surat_izin_ortu_pr',
        'ktp_wali',
        'fc_kutipan_akta',
        'surat_pernyataan_status',
        'foto_biru',
        'surat_dispen',
        'akta_cerai',
        'status',
        'created_at',
        'updated_at',
    ];
}