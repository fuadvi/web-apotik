@extends('layouts.admin.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Racik Obat</h1>
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
                <form action="{{route('resep.store', $pasien->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="dokter_id">Dokter</label>
                        <select name="dokter_id" required class="form-control">
                            <option >Dokter Spesialis</option>
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}">
                                    {{ $dokter->nama_dokter }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="obat_id">Obat</label>
                        <select name="obat_id" required class="form-control">
                            <option >Racik obat</option>
                            @foreach ($obats as $obat)
                                <option value="{{ $obat->id }}">
                                    {{ $obat->nama_obat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah obat yang di berikan untuk pasien" value="{{ old('jumlah') }}" class="form-control">
                        <input type="hidden" name="pasien_id" id="pasien_id"  value="{{ $pasien->id }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="dosis">Dosis</label>
                        <select name="dosis" class="form-control">
                            <option value="10-15">Low (10%-15%)</option>
                            <option value="25-50">Medium (25%-50%)</option>
                            <option value="75-100">Sangat Kuat (75%-100%)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_resep">Tanggal Pembuatan Resep</label>
                        <input type="date" name="tanggal_resep" id="tanggal_resep" value="{{ old('tanggal_resep') }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
@endsection