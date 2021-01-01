<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\obat;
use App\dokter;
use App\pasien;
use App\User;



class ControllerUser extends Controller
{
    public function index()
    {
        $item=user::paginate(5);
        return view('pages.aadmin.user.index',[
        'items'=>$item 
        ]);
    }
}
