@extends('layouts.admin.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Obat</h1>
        </div>


    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

        <div class="card">
            <div class="card-body">
                <form action="{{route('obat.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat" placeholder="Masukkan nama obat" value="{{ old('nama_obat') }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="kode_obat">Kode Obat</label>
                        <input type="text" name="kode_obat" id="kode_obat" placeholder="Masukkan kode obat" value="{{ old('kode_obat') }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input type="number" name="harga_satuan" id="harga_satuan" placeholder="Masukkan harga satuan" value="{{ old('harga_satuan') }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="stock_obat">Stock Obat</label>
                        <input type="number" name="stock_obat" id="stock_obat" placeholder="Masukkan jumlah obat" value="{{ old('stock_obat') }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="jenis_obat">Satuan</label>
                        <select name="jenis_obat" class="form-control">
                            <option value="kaplet">Kaplet</option>
                            <option value="botol">Botol</option>     
                            </select> 
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
@endsection