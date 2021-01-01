<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\obat;
use App\obat_masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerObat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = obat::paginate(5);
        return view('pages.aadmin.data_obat.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.aadmin.data_obat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['nama_obat'] = strtoupper($request->nama_obat);
        obat::create($data);

        return redirect()->route('obat.index')->with('Obat Masuk berhasil masuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function cari(Request $request) {
        $cari=$request->cari;
        $items=DB::table('obat')
            ->where('nama_obat','like',"%".$cari."%")
            ->paginate();
        return view('pages.aadmin.data_obat.index', ['items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = obat::findOrFail($id);
        return view('pages.aadmin.data_obat.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = obat::findOrFail($id);
        $item->update($data);
        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = obat::findOrFail($id);
        $item->delete();
        return redirect()->route('obat.index');
    }
}
