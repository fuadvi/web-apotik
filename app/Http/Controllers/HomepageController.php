<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dokter;

class HomepageController extends Controller
{
    public function index(){
        $items = dokter::limit(3)->get();
        return view('layouts.index',[
            'items' => $items
        ]);
    }
}
