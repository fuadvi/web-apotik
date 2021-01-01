<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\obatMasukRequerst;
use App\obat;
use App\obat_masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerObatMasuk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = obat_masuk::paginate(5);
        return view('pages.aadmin.obat_masuk.index', [
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
        $obatMasuks = obat::all();
        // dd($obatMasuks);
        return view('pages.aadmin.obat_masuk.create', [
            'obatMasuks' => $obatMasuks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(obatMasukRequerst $request)
    {
        $data = $request->all();
        $nama = obat::findOrfail($request->kode_obat);
        $data['nama_obat'] = $nama->nama_obat;
        obat_masuk::create($data);

        $obat =   obat::with(['obatMasuk'])->find($request->kode_obat);

        if ($request->kode_obat) {
            $obat->stock_obat += $request->jumlah;
        }
        $obat->save();

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
        $items=DB::table('obat_masuk')
            ->where('nama_obat','like',"%".$cari."%")
            ->paginate();
        return view('pages.aadmin.obat_masuk.index', ['items' => $items]);
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
        $item = obat_masuk::findOrFail($id);
        $item->delete();
        return redirect()->route('obat_masuk.index');
    }
}
