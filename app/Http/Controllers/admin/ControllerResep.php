<?php

namespace App\Http\Controllers\admin;

use App\dokter;
use App\Http\Controllers\Controller;
use App\obat;
use App\resep;
use App\pasien;
use App\kasir;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ControllerResep extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data tabel pasien
        $item = pasien::paginate(5);
        $resep = resep::paginate(5);

        return view('pages.aadmin.resep.index', [
            'items' => $item,
            'resep' => $resep
        ]);
    }

    public function details()
    {
        // mengambil data tabel pasien
        $item = resep::with([
            'obat',
            'dokter',
            'pasien'
        ])->get();

        return view('pages.aadmin.resep.resepShowAll', [
            'items' => $item
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $obat = obat::all();
        $dokter = dokter::all();
        $pasien = pasien::findOrfail($id);
        return view('pages.aadmin.resep.create', [
            'obats' => $obat,
            'pasien' => $pasien,
            'dokters' => $dokter
        ]);
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
        $nama = pasien::findOrfail($request->pasien_id);
        $data['slug'] = Str::slug($nama->nama_pasien);

        $resep = resep::create($data);
        $obat = obat::with(["resep"])->findOrfail($request->obat_id);
        if ($request->obat_id) {
            $obat->stock_obat -= $request->jumlah;
        }
        $obat->save();
        $pasien = pasien::findOrfail($request->pasien_id);

        kasir::create([
            'nama_pasien' => $pasien->nama_pasien,
            'kode_resep' => $resep->id,
            'harga_pembelian' => $obat->harga_satuan * $request->jumlah,
            'tanggal_pembelian' => Carbon::now()
        ]);
        return redirect()->route('kasir.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obat = obat::all();
        $dokter = dokter::all();
        $pasien = pasien::findOrfail($id);
        return view('pages.aadmin.resep.create', [
            'obats' => $obat,
            'pasien' => $pasien,
            'dokters' => $dokter
        ]);
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $items = DB::table('resep')
            ->where('nama_resep', 'like', "%" . $cari . "%")
            ->paginate();
        return view('pages.aadmin.resep.index', ['items' => $items]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $item = resep::with(['obat', 'pasien', 'dokter'])->findOrFail($id);
        // // dd($item);
        // return view('pages.aadmin.resep.resepShow', [
        //     'item' => $item
        // ]);
    }

    public function detailPasien(Request $request, $slug)
    {
        $item = resep::with(['obat', 'pasien', 'dokter'])
            ->where("slug", $slug)
            ->paginate(5);

        // dd($item);
        return view('pages.aadmin.resep.resepShow', [
            'items' => $item
        ]);
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
        $data['pasien_id'] = $id;

        resep::create($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
