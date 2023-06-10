<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = DB::table('users')
            ->where('role','=','user')
            ->get();
        $jml_user = $users->count();
        
        $pendaftar = DB::table('pendaftaran')
            ->get();
        $jml_daftar = $pendaftar->count();

        $pendaftar_proses = DB::table('pendaftaran')
            ->where('status', '=', 1)
            ->get();
        $jml_proses = $pendaftar_proses->count();
        
        $pendaftar_selesai = DB::table('pendaftaran')
            ->where('status', '=', 2)
            ->get();
        $jml_selesai = $pendaftar_selesai->count();
        
        $pendaftar_ditolak = DB::table('pendaftaran')
            ->where('status', '=', 3)
            ->get();
        $jml_ditolak = $pendaftar_ditolak->count();
        
        $sql = DB::table('jadwals')
            ->where('tanggal', '>', now())
            ->get();
        $nikah = $sql->count();
            
        return view('admin/dashboard/index')->with([
            'title'         => 'Dashboard',
            'jml_user'      => $jml_user,
            'jml_daftar'    => $jml_daftar,
            'jml_proses'    => $jml_proses,
            'jml_ditolak'   => $jml_ditolak,
            'jml_selesai'   => $jml_selesai,
            'jadwal_nikah'  => $nikah,
        ]);
    }

    // Menu Pendaftaran
    public function pendaftaran()
    {
        $users = DB::table('pendaftaran')
            ->leftJoin('users', 'users.id', '=', 'pendaftaran.user_id')
            ->get();
            
        return view('admin/pendaftaran/index')->with([
            'title'         => 'Pendaftaran Nikah',
            'users'         => $users
        ]);
    }

    public function detailPendaftaran($user_id)
    {
        $users = DB::table('pendaftaran')
                ->leftJoin('users', 'users.id', '=', 'pendaftaran.user_id')
                ->where('pendaftaran.user_id', '=', $user_id)
                ->get();

        $id = DB::table('pendaftaran')->where('user_id', $user_id)->value('id');                

        $jadwal = DB::table('pendaftaran')
                ->leftJoin('jadwals', 'jadwals.user_id', '=', 'pendaftaran.user_id')
                ->where('pendaftaran.user_id', '=', $user_id)
                ->get();

        return view('admin/pendaftaran/detail')->with([
            'title'     => 'Detail Pendaftaran',
            'users'     => $users,
            'id'        => $id,
            'jadwal'    => $jadwal,
        ]);
    }

    public function updatePendaftaran($user_id)
    {
        $pendaftaran = DB::table('pendaftaran')
            ->where('user_id', $user_id)
            ->update([
                'status'    => 2,
                'pesan'     => '',
            ]);

        return redirect()->back()->with('sukses', 'Pendaftaran Nikah Disetujui!');
    }

    // public function tolakPendaftaran($user_id)
    // {
    //     $pendaftaran = DB::table('pendaftaran')
    //         ->where('user_id', $user_id)
    //         ->update([
    //             'status' => 3
    //         ]);

    //     return redirect()->back()->with('ditolak', 'Pendaftaran Nikah Ditolak!');
    // }
    
    public function tolakPendaftaran(Request $request, $id)
    {
        $pendaftaran = DB::table('pendaftaran')
            ->where('id', $id)
            ->update([
                'status'    => 3,
                'pesan'     => $request->pesan,
            ]);

        return redirect()->back()->with('ditolak', 'Pendaftaran Nikah Ditolak!');
    }

    public function createJadwal(Request $request)
    {
        $rules = [
            'user_id'   => 'required|string',
            'penghulu'  => 'required|string',
            'biaya'     => 'required|numeric',
            'tanggal'   => 'required|date',
            'jam'       => 'required',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->messages())->withInput();
        } else { 
            Jadwal::create([
                'user_id'       => $request->user_id,
                'penghulu'      => $request->penghulu,
                'biaya'         => $request->biaya,
                'tanggal'       => $request->tanggal,
                'jam'           => $request->jam,
                'created_at'    => now(),
            ]);

            return redirect()->back()->with('sukses', 'Berhasil Membuat Jadwal');
        }
    }

    // Menu Pendaftaran
    public function showJadwal()
    {
        $jadwal = DB::table('jadwals')
                ->leftJoin('users', 'users.id', '=', 'jadwals.user_id')
                ->leftJoin('pendaftaran', 'pendaftaran.user_id', '=', 'users.id')
                ->get();
            
        return view('admin/jadwal/index')->with([
            'title'         => 'Jadwal Pelaksanaan Nikah',
            'jadwal'         => $jadwal
        ]);
    }

    public function showDetailJadwal(Request $request, $user_id)
    {
        $jadwal = DB::table('jadwals')
                ->leftJoin('users', 'users.id', '=', 'jadwals.user_id')
                ->leftJoin('pendaftaran', 'pendaftaran.user_id', '=', 'users.id')
                ->where('users.id', '=', $user_id)
                ->get();
            
        return view('admin/jadwal/detail')->with([
            'title'         => 'Jadwal Pelaksanaan Nikah',
            'jadwal'         => $jadwal
        ]);
    }

    public function updateJadwal(Request $request, $user_id)
    {

        $rules = [
            'user_id'   => 'required|string',
            'penghulu'  => 'required|string',
            'biaya'     => 'required|numeric',
            'tanggal'   => 'required|date',
            'jam'       => 'required',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->messages())->withInput();
        } else { 
            $jadwal = DB::table('jadwals')
                ->leftJoin('users', 'users.id', '=', 'jadwals.user_id')
                ->leftJoin('pendaftaran', 'pendaftaran.user_id', '=', 'users.id')
                ->where('users.id', '=', $user_id)
                ->update([
                    'penghulu'  => $request->penghulu,
                    'biaya'     => $request->biaya,
                    'tanggal'   => $request->tanggal,
                    'jam'       => $request->jam,
                ]);

        return redirect()->back()->with('sukses', 'Jadwal Pelaksanaan Nikah Diperbarui!');
        }
    }
}