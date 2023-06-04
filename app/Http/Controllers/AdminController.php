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
        $data = [
            'title'     => 'Dashboard'
        ];
        return view('admin/dashboard/index', $data);
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

        $jadwal = DB::table('pendaftaran')
                ->leftJoin('jadwals', 'jadwals.user_id', '=', 'pendaftaran.user_id')
                ->where('pendaftaran.user_id', '=', $user_id)
                ->get();

        return view('admin/pendaftaran/detail')->with([
            'title'     => 'Detail Pendaftaran',
            'users'     => $users,
            'jadwal'    => $jadwal,
        ]);
    }

    public function updatePendaftaran($user_id)
    {
        $pendaftaran = DB::table('pendaftaran')
              ->where('user_id', $user_id)
              ->update(['status' => 2]);

        return redirect()->back()->with('sukses', 'Pendaftaran Nikah Disetujui!');
    }

    public function tolakPendaftaran($user_id)
    {
        $pendaftaran = DB::table('pendaftaran')
              ->where('user_id', $user_id)
              ->update(['status' => 3]);

        return redirect()->back()->with('ditolak', 'Pendaftaran Nikah Ditolak!');
    }

    public function createJadwal(Request $request)
    {
        $rules = [
            'user_id'   => 'required|string',
            'penghulu'  => 'required|string',
            'biaya'     => 'required|numeric',
            'tanggal'   => 'required|date',
            'jam'       => 'required|date_format:H:i',
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
                ->get();
            
        return view('admin/jadwal/index')->with([
            'title'         => 'Jadwal Pelaksanaan Nikah',
            'jadwal'         => $jadwal
        ]);
    }
}