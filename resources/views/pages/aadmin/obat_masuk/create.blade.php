@extends('layouts.admin.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Data Obat Masuk</h1>
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
                <form action="{{route('obat_masuk.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_obat">Nama Obat</label>
                        <select name="kode_obat" required class="form-control">
                            <option >Nama Obat</option>
                            @foreach ($obatMasuks as $obatMasuk)
                                <option value="{{ $obatMasuk->id }}">
                                    {{ $obatMasuk->nama_obat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input type="number" name="harga_satuan" id="harga_satuan" placeholder="Masukkan harga satuan" value="{{ old('harga_satuan') }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan nama obat" value="{{ old('jumlah') }}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="jenis_obat">Satuan</label>
                    <select name="jenis_obat" class="form-control">
                    <option value="kaplet">Kaplet</option>
                    <option value="botol">Botol</option>     
                    </select> 

                    </div>
                    
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
@endsection