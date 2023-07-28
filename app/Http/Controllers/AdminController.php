<?php

namespace App\Http\Controllers;

use App\Charts\NikahChart;
use App\Charts\PendaftarChart;
use App\Charts\UsersChart;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard(Request $request, UsersChart $usersChart, PendaftarChart $pendaftarChart, NikahChart $nikahChart)
    {
        $now = date('Y-m-d');
        $oneWeekAfter = date('Y-m-d', strtotime('+1 week', strtotime($now)));

        $oneMonthAfter = date('Y-m-d', strtotime('+4 week', strtotime($now)));

        if ($request->has('search')) {
            if ($request->search == 'week') {
                $data = DB::table('jadwals as a')
                    ->join('pendaftaran as b', 'b.user_id', '=', 'a.user_id')
                    ->join('users as c', 'c.id', '=', 'b.user_id')
                    ->whereDate('a.tanggal', '<=', $oneWeekAfter)
                    ->paginate(10);
            } elseif ($request->search == 'month') {
                $data = DB::table('jadwals as a')
                    ->join('pendaftaran as b', 'b.user_id', '=', 'a.user_id')
                    ->join('users as c', 'c.id', '=', 'b.user_id')
                    ->whereDate('a.tanggal', '<=', $oneMonthAfter)
                    ->paginate(10);
            } else {
                // If neither 'week' nor 'month' is selected, show all records within a certain date range.
                $data = DB::table('jadwals as a')
                    ->join('pendaftaran as b', 'b.user_id', '=', 'a.user_id')
                    ->join('users as c', 'c.id', '=', 'b.user_id')
                    ->whereDate('a.tanggal', '<=', now()) // 'now()' will give the current date.
                    ->paginate(10);
            }
        } else {
            // If 'search' parameter is not present, show all records within a certain date range.
            $data = DB::table('jadwals as a')
                ->join('pendaftaran as b', 'b.user_id', '=', 'a.user_id')
                ->join('users as c', 'c.id', '=', 'b.user_id')
                ->whereDate('a.tanggal', '<=', now()) // 'now()' will give the current date.
                ->paginate(10);
        }


        $proses = DB::table('pendaftaran')->where('status', '=', 1)->count();
        $selesai = DB::table('pendaftaran')->where('status', '=', 2)->count();
        $tolak = DB::table('pendaftaran')->where('status', '=', 3)->count();
        $total = DB::table('pendaftaran')->count();

        return view('admin/dashboard/index', [
            'title' => 'Dashboard', 'usersChart' => $usersChart->build(), 'pendaftarChart' => $pendaftarChart->build(), 'nikahChart' => $nikahChart->build(), 'show' => $data,
            'proses' => $proses,
            'selesai' => $selesai,
            'tolak' => $tolak,
            'total' => $total,
        ]);
    }

    // Menu Pendaftaran
    public function pendaftaran()
    {
        $users = DB::table('pendaftaran')
            ->leftJoin('users', 'users.id', '=', 'pendaftaran.user_id')
            ->orderByDesc('pendaftaran.id')
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
            ->orderByDesc('jadwals.id')
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
