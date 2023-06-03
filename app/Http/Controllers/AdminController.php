<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = [
            'title'     => 'Pendaftaran'
        ];
        return view('admin/pendaftaran/index', $data);
    }
}