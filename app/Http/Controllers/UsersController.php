<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    // Menu Dashboard
    public function dashboard()
    {
        return view('user/dashboard/index')->with([
            'title'     => 'Dashboard'
        ]);
    }


    // Menu Pendaftaran
    public function pendaftaran()
    {
        $users = DB::table('pendaftaran')
            ->leftJoin('users', 'users.id', '=', 'pendaftaran.user_id')
            ->where('pendaftaran.user_id', '=', Auth::user()->id)
            ->get();

        return view('user/pendaftaran/index')->with([
            'title'     => 'Pendaftaran Nikah',
            'users'     => $users
        ]);
    }

    public function create()
    {
        return view('user/pendaftaran/create')->with([
            'title'     => 'Form Pendaftaran Pernikahan',
            'user_id'   => Auth::user()->id,
        ]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'user_id'                   => 'required|string',
            'nama_pengantin_lk'         => 'required|string',
            'nama_pengantin_pr'         => 'required|string',
            'umur_lk'                   => 'required|numeric',
            'umur_pr'                   => 'required|numeric',
            'ktp_lk'                    => 'required|mimetypes:application/pdf|max:2048',
            'ktp_pr'                    => 'required|mimetypes:application/pdf|max:2048',
            'ijasah_lk'                 => 'required|mimetypes:application/pdf|max:2048',
            'ijasah_pr'                 => 'required|mimetypes:application/pdf|max:2048',
            'akta_lk'                   => 'required|mimetypes:application/pdf|max:2048',
            'akta_pr'                   => 'required|mimetypes:application/pdf|max:2048',
            'surat_pengantar'           => 'required|mimetypes:application/pdf|max:2048',
            'surat_asal_lk'             => 'required|mimetypes:application/pdf|max:2048',        
            'surat_asal_pr'             => 'required|mimetypes:application/pdf|max:2048',
            'surat_persetujuan_ortu_lk' => 'required|mimetypes:application/pdf|max:2048',
            'surat_persetujuan_ortu_pr' => 'required|mimetypes:application/pdf|max:2048',
            'surat_izin_ortu_pr'        => 'required|mimetypes:application/pdf|max:2048',
            'ktp_wali'                  => 'required|mimetypes:application/pdf|max:2048',
            'fc_kutipan_akta'           => 'required|mimetypes:application/pdf|max:2048',
            'surat_pernyataan_status'   => 'required|mimetypes:application/pdf|max:2048',
            'foto_pengantin_lk'         => 'required|mimes:png,jpg,jpeg|max:2048',
            'foto_pengantin_pr'         => 'required|mimes:png,jpg,jpeg|max:2048',
            'surat_dispen'              => 'mimetypes:application/pdf|max:2048',
            'akta_cerai'                => 'mimetypes:application/pdf|max:2048',
            'tanggal_pilihan'           => 'required',
            'tempat_nikah'              => 'required|string',
            'alamat'                    => 'string',
        ],
        [
            'user_id.required'                      => 'Kolom Tidak Boleh Dikosongi',
            'nama_pengantin_lk.required'            => 'Kolom Tidak Boleh Dikosongi',
            'nama_pengantin_pr.required'            => 'Kolom Tidak Boleh Dikosongi',
            'umur_lk.required'                      => 'Kolom Tidak Boleh Dikosongi',
            'umur_pr.required'                      => 'Kolom Tidak Boleh Dikosongi',
            'ktp_lk.required'                       => 'Kolom Tidak Boleh Dikosongi',
            'ktp_pr.required'                       => 'Kolom Tidak Boleh Dikosongi',
            'ijasah_lk.required'                    => 'Kolom Tidak Boleh Dikosongi',
            'ijasah_pr.required'                    => 'Kolom Tidak Boleh Dikosongi',
            'akta_lk.required'                      => 'Kolom Tidak Boleh Dikosongi',
            'akta_pr.required'                      => 'Kolom Tidak Boleh Dikosongi',
            'surat_pengantar.required'              => 'Kolom Tidak Boleh Dikosongi',
            'surat_asal_lk.required'                => 'Kolom Tidak Boleh Dikosongi', 
            'surat_asal_pr.required'                => 'Kolom Tidak Boleh Dikosongi',
            'surat_persetujuan_ortu_lk.required'    => 'Kolom Tidak Boleh Dikosongi',
            'surat_persetujuan_ortu_pr.required'    => 'Kolom Tidak Boleh Dikosongi',
            'surat_izin_ortu_pr.required'           => 'Kolom Tidak Boleh Dikosongi',
            'ktp_wali.required'                     => 'Kolom Tidak Boleh Dikosongi',
            'fc_kutipan_akta.required'              => 'Kolom Tidak Boleh Dikosongi',
            'surat_pernyataan_status.required'      => 'Kolom Tidak Boleh Dikosongi',
            'foto_pengantin_lk.required'            => 'Kolom Tidak Boleh Dikosongi',
            'foto_pengantin_pr.required'            => 'Kolom Tidak Boleh Dikosongi',
            'tanggal_pilihan.required'              => 'Kolom Tidak Boleh Dikosongi',
            'tempat_nikah.required'                 => 'Kolom Tidak Boleh Dikosongi',

            'ktp_lk.max'                            => 'Ukuran File Maksimal 2 MB',
            'ktp_pr.max'                            => 'Ukuran File Maksimal 2 MB',
            'ijasah_lk.max'                         => 'Ukuran File Maksimal 2 MB',
            'ijasah_pr.max'                         => 'Ukuran File Maksimal 2 MB',
            'akta_lk.max'                           => 'Ukuran File Maksimal 2 MB',
            'akta_pr.max'                           => 'Ukuran File Maksimal 2 MB',
            'surat_pengantar.max'                   => 'Ukuran File Maksimal 2 MB',
            'surat_asal_lk.max'                     => 'Ukuran File Maksimal 2 MB', 
            'surat_asal_pr.max'                     => 'Ukuran File Maksimal 2 MB',
            'surat_persetujuan_ortu_lk.max'         => 'Ukuran File Maksimal 2 MB',
            'surat_persetujuan_ortu_pr.max'         => 'Ukuran File Maksimal 2 MB',
            'surat_izin_ortu_pr.max'                => 'Ukuran File Maksimal 2 MB',
            'ktp_wali.max'                          => 'Ukuran File Maksimal 2 MB',
            'fc_kutipan_akta.max'                   => 'Ukuran File Maksimal 2 MB',
            'surat_pernyataan_status.max'           => 'Ukuran File Maksimal 2 MB',
            'foto_pengantin_lk.max'                 => 'Ukuran File Maksimal 2 MB',
            'foto_pengantin_pr.max'                 => 'Ukuran File Maksimal 2 MB',
            'surat_dispen.max'                      => 'Ukuran File Maksimal 2 MB',
            'akta_cerai.max'                        => 'Ukuran File Maksimal 2 MB',
        ]);

        $errors = $validate->errors();

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->messages())->withInput();
        } else { 
            $ktp_lk                         = $request->file('ktp_lk');
            $ktp_pr                         = $request->file('ktp_pr');
            $ijasah_lk                      = $request->file('ijasah_lk');
            $ijasah_pr                      = $request->file('ijasah_pr');
            $akta_lk                        = $request->file('akta_lk');
            $akta_pr                        = $request->file('akta_pr');
            $surat_pengantar                = $request->file('surat_pengantar');
            $surat_asal_lk                  = $request->file('surat_asal_lk');
            $surat_asal_pr                  = $request->file('surat_asal_pr');
            $surat_persetujuan_ortu_lk      = $request->file('surat_persetujuan_ortu_lk');
            $surat_persetujuan_ortu_pr      = $request->file('surat_persetujuan_ortu_pr');
            $surat_izin_ortu_pr             = $request->file('surat_izin_ortu_pr');
            $ktp_wali                       = $request->file('ktp_wali');
            $fc_kutipan_akta                = $request->file('fc_kutipan_akta');
            $surat_pernyataan_status        = $request->file('surat_pernyataan_status');
            $foto_pengantin_lk              = $request->file('foto_pengantin_lk');
            $foto_pengantin_pr              = $request->file('foto_pengantin_pr');
            $surat_dispen                   = $request->file('surat_dispen');
            $akta_cerai                     = $request->file('akta_cerai');
            $tanggal_pilihan                = $request->file('tanggal_pilihan');

            $file_ktp_lk                    = date('Y-m-d').(' ').$ktp_lk->getClientOriginalName();
            $file_ktp_pr                    = date('Y-m-d').(' ').$ktp_pr->getClientOriginalName(); 
            $file_ijasah_lk                 = date('Y-m-d').(' ').$ijasah_lk->getClientOriginalName(); 
            $file_ijasah_pr                 = date('Y-m-d').(' ').$ijasah_pr->getClientOriginalName(); 
            $file_akta_lk                   = date('Y-m-d').(' ').$akta_lk->getClientOriginalName(); 
            $file_akta_pr                   = date('Y-m-d').(' ').$akta_pr->getClientOriginalName(); 
            $file_surat_pengantar           = date('Y-m-d').(' ').$surat_pengantar->getClientOriginalName(); 
            $file_surat_asal_lk             = date('Y-m-d').(' ').$surat_asal_lk->getClientOriginalName(); 
            $file_surat_asal_pr             = date('Y-m-d').(' ').$surat_asal_pr->getClientOriginalName(); 
            $file_surat_persetujuan_ortu_lk = date('Y-m-d').(' ').$surat_persetujuan_ortu_lk->getClientOriginalName(); 
            $file_surat_persetujuan_ortu_pr = date('Y-m-d').(' ').$surat_persetujuan_ortu_pr->getClientOriginalName(); 
            $file_surat_izin_ortu_pr        = date('Y-m-d').(' ').$surat_izin_ortu_pr->getClientOriginalName(); 
            $file_ktp_wali                  = date('Y-m-d').(' ').$ktp_wali->getClientOriginalName(); 
            $file_fc_kutipan_akta           = date('Y-m-d').(' ').$fc_kutipan_akta->getClientOriginalName(); 
            $file_surat_pernyataan_status   = date('Y-m-d').(' ').$surat_pernyataan_status->getClientOriginalName(); 
            $file_foto_pengantin_lk         = date('Y-m-d').(' ').$foto_pengantin_lk->getClientOriginalName(); 
            $file_foto_pengantin_pr         = date('Y-m-d').(' ').$foto_pengantin_pr->getClientOriginalName(); 
            
            if ($surat_dispen == NULL) {
                $file_surat_dispen          = ''; 
            } else {
                $file_surat_dispen          = date('Y-m-d').(' ').$surat_dispen->getClientOriginalName(); 
            }

            if ($akta_cerai == NULL) {
                $file_akta_cerai            = '';
            } else {
                $file_akta_cerai            = date('Y-m-d').(' ').$akta_cerai->getClientOriginalName();
            }
            
            $path_ktp_lk                    = 'pendaftaran/KTP/'.$file_ktp_lk;                   
            $path_ktp_pr                    = 'pendaftaran/KTP/'.$file_ktp_pr;                  
            $path_ijasah_lk                 = 'pendaftaran/IJASAH/'.$file_ijasah_lk;                
            $path_ijasah_pr                 = 'pendaftaran/IJASAH/'.$file_ijasah_pr;                
            $path_akta_lk                   = 'pendaftaran/AKTA/'.$file_akta_lk;                  
            $path_akta_pr                   = 'pendaftaran/AKTA/'.$file_akta_pr;                 
            $path_surat_pengantar           = 'pendaftaran/SURAT PENGANTAR/'.$file_surat_pengantar;          
            $path_surat_asal_lk             = 'pendaftaran/SURAT ASAL/'.$file_surat_asal_lk;            
            $path_surat_asal_pr             = 'pendaftaran/SURAT ASAL/'.$file_surat_asal_pr;            
            $path_surat_persetujuan_ortu_lk = 'pendaftaran/SURAT PERSETUJUAN/'.$file_surat_persetujuan_ortu_lk;
            $path_surat_persetujuan_ortu_pr = 'pendaftaran/SURAT PERSETUJUAN/'.$file_surat_persetujuan_ortu_pr;
            $path_surat_izin_ortu_pr        = 'pendaftaran/SURAT IZIN/'.$file_surat_izin_ortu_pr;
            $path_ktp_wali                  = 'pendaftaran/KTP WALI/'.$file_ktp_wali;      
            $path_fc_kutipan_akta           = 'pendaftaran/KUTIPAN AKTA/'.$file_fc_kutipan_akta;          
            $path_surat_pernyataan_status   = 'pendaftaran/SURAT STATUS/'.$file_surat_pernyataan_status;  
            $path_foto_pengantin_lk         = 'pendaftaran/FOTO/'.$file_foto_pengantin_lk; 
            $path_foto_pengantin_pr         = 'pendaftaran/FOTO/'.$file_foto_pengantin_pr; 
            $path_surat_dispen              = 'pendaftaran/SURAT DISPEN/'.$file_surat_dispen;             
            $path_akta_cerai                = 'pendaftaran/AKTA CERAI/'.$file_akta_cerai;
            
            Storage::disk('public')->put($path_ktp_lk, file_get_contents($ktp_lk));
            Storage::disk('public')->put($path_ktp_pr, file_get_contents($ktp_pr));
            Storage::disk('public')->put($path_ijasah_lk, file_get_contents($ijasah_lk));
            Storage::disk('public')->put($path_ijasah_pr, file_get_contents($ijasah_pr));
            Storage::disk('public')->put($path_akta_lk, file_get_contents($akta_lk));
            Storage::disk('public')->put($path_akta_pr, file_get_contents($akta_pr));
            Storage::disk('public')->put($path_surat_pengantar, file_get_contents($surat_pengantar));
            Storage::disk('public')->put($path_surat_asal_lk, file_get_contents($surat_asal_lk));
            Storage::disk('public')->put($path_surat_asal_pr, file_get_contents($surat_asal_pr));
            Storage::disk('public')->put($path_surat_persetujuan_ortu_lk, file_get_contents($surat_persetujuan_ortu_lk));
            Storage::disk('public')->put($path_surat_persetujuan_ortu_pr, file_get_contents($surat_persetujuan_ortu_pr));
            Storage::disk('public')->put($path_surat_izin_ortu_pr, file_get_contents($surat_izin_ortu_pr));
            Storage::disk('public')->put($path_ktp_wali, file_get_contents($ktp_wali));
            Storage::disk('public')->put($path_fc_kutipan_akta, file_get_contents($fc_kutipan_akta));
            Storage::disk('public')->put($path_surat_pernyataan_status, file_get_contents($surat_pernyataan_status));
            Storage::disk('public')->put($path_foto_pengantin_lk, file_get_contents($foto_pengantin_lk));
            Storage::disk('public')->put($path_foto_pengantin_pr, file_get_contents($foto_pengantin_pr));
            
            if ($surat_dispen != NULL) {
            Storage::disk('public')->put($path_surat_dispen, file_get_contents($surat_dispen));
            }
            
            if ($akta_cerai != NULL) {
                Storage::disk('public')->put($path_akta_cerai, file_get_contents($akta_cerai));
            }

            DB::table('pendaftaran')->insert([
            'user_id'                       => $request->user_id,
            'nama_pengantin_lk'             => $request->nama_pengantin_lk,
            'nama_pengantin_pr'             => $request->nama_pengantin_pr,
            'umur_lk'                       => $request->umur_lk,
            'umur_pr'                       => $request->umur_pr,
            'ktp_lk'                        => $file_ktp_lk,
            'ktp_pr'                        => $file_ktp_pr,
            'ijasah_lk'                     => $file_ijasah_lk,
            'ijasah_pr'                     => $file_ijasah_pr,
            'akta_lk'                       => $file_akta_lk,
            'akta_pr'                       => $file_akta_pr,
            'surat_pengantar'               => $file_surat_pengantar,
            'surat_asal_lk'                 => $file_surat_asal_lk,      
            'surat_asal_pr'                 => $file_surat_asal_pr,
            'surat_persetujuan_ortu_lk'     => $file_surat_persetujuan_ortu_lk,
            'surat_persetujuan_ortu_pr'     => $file_surat_persetujuan_ortu_pr,
            'surat_izin_ortu_pr'            => $file_surat_izin_ortu_pr,
            'ktp_wali'                      => $file_ktp_wali,
            'fc_kutipan_akta'               => $file_fc_kutipan_akta,
            'surat_pernyataan_status'       => $file_surat_pernyataan_status,
            'foto_pengantin_lk'             => $file_foto_pengantin_lk,
            'foto_pengantin_pr'             => $file_foto_pengantin_pr,
            'surat_dispen'                  => $file_surat_dispen,
            'akta_cerai'                    => $file_akta_cerai,
            'status'                        => 1,
            'tanggal_pilihan'               => $request->tanggal_pilihan,
            'tempat_nikah'                  => $request->tempat_nikah,
            'alamat'                        => $request->alamat,
            'created_at'                    => now(),
            'updated_at'                    => now(),
            ]);

            return redirect()->route('pendaftaran')->with('sukses', 'Pendaftaran anda telah disimpan');
        }
    }

     // Menu Pendaftaran
     public function showJadwal()
     {
         $jadwal = DB::table('jadwals')
                 ->leftJoin('users', 'users.id', '=', 'jadwals.user_id')
                 ->leftJoin('pendaftaran', 'pendaftaran.user_id', '=', 'users.id')
                 ->where('users.id', '=', Auth::user()->id)
                 ->get();
             
         return view('user/penjadwalan/index')->with([
             'title'         => 'Tanggal Pelaksanaan Nikah',
             'jadwal'         => $jadwal
         ]);
     }
}