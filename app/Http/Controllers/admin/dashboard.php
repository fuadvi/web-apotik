<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\obat;
use App\dokter;
use App\pasien;
use App\User;



class dashboard extends Controller
{
    public function index()
    {
        return view('pages.aadmin.dashboard',[
            'dokter' => dokter::count(),
            'user' => User::count(),
            'obat' => obat::count(),
            'pasien' => pasien::count(),
        ]);
    }
}
