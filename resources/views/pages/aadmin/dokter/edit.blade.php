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
                <form action="{{route('dokter.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama_dokter">Nama Dokter</label>
                        <input type="text" name="nama_dokter" id="nama_dokter" placeholder="Masukkan nama dokter" value="{{ $item->nama_dokter }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="spesialis">Spesialis</label>
                        <input type="text" name="spesialis" id="spesialis" placeholder="Masukkan keterangan" value="{{ $item->spesialis}}" class="form-control">
                    </div>

                    

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" value="{{ $item->foto}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="kode_resep">Kode Resep</label>
                        <input type="text" name="kode_resep" id="kode_resep" placeholder="Masukkan kode" value=""{{ $item->kode_resep}}"" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Ubah</button>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection