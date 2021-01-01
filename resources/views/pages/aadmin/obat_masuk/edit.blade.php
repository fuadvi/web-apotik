@extends('layouts.admin.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit {{ $item->keterangan }}</h1>
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
                <form action="{{route('obat.update', $item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                   <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat" placeholder="Masukkan nama obat" value="{{ $item->nama_obat }}" class="form-control">
                    </div>
                    
                   <div class="form-group">
                        <label for="kode_obat">Kode Obat</label>
                        <input type="text" name="kode_obat" id="kode_obat" placeholder="Masukkan kode obat" value="{{ $item->kode_obat }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input type="number" name="harga_satuan" id="harga_satuan" placeholder="Masukkan harga satuan" value="{{ $item->harga_satuan }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="stock_obat">Stock Obat</label>
                        <input type="text" name="stock_obat" id="stock_obat" placeholder="Masukkan jumlah obat" value="{{ $item->stock_obat }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="jenis_obat">Jenis Obat</label>
                        <input type="text" name="jenis_obat" id="jenis_obat" placeholder="Masukkan jenis obat" value="{{ $item->jenis_obat}}" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary btn-block">Ubah</button>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection