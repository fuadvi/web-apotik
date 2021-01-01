<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerDokter extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = dokter::paginate(5);
        return view('pages.aadmin.dokter.index', [
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
        return view('pages.aadmin.dokter.create');
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
        $data['foto'] = $request->file('foto')->store(
            'assets/gallery',
            'public'
        );

        dokter::create($data);
        return redirect()->route('dokter.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = dokter::findOrFail($id);
        return view('pages.aadmin.dokter.edit', ['item' => $item]);
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
        $data['foto'] = $request->file('foto')->store(
            'assets/gallery',
            'public'
        );
        $item = dokter::findOrFail($id);
        $item->update($data);
        return redirect()->route('dokter.index');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $items = DB::table('dokter')
            ->where('nama_dokter', 'like', "%" . $cari . "%")
            ->paginate();
        return view('pages.aadmin.dokter.index', ['items' => $items]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = dokter::findOrFail($id);
        $item->delete();
        return redirect()->route('obat.index');
    }
}
