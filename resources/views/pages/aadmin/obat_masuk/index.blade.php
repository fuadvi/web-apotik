@extends('layouts.admin.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Obat Masuk</h1>
            <a href="{{ route("obat_masuk.create") }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Obat Masuk
            </a>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <form action="{{route('cari_obatmasuk')}}" method="GET">
            <input type="text" name="cari" value="{{ old('cari')}}">
            <input type="submit" value="cari">
            </form>
        </div>
        
        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Obat</th>
                            <th>Kode Obat</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Tanggal masuk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_obat }}</td>
                                <td>{{ $item->kode_obat }}</td>
                                <td>{{ $item->harga_satuan }}</td>
                                <td>{{ $item->jumlah}}</td>
                                <td>{{ $item->jenis_obat}}</td>
                                <td>{{ $item->tanggal_masuk}}</td>
                                <td>
                                    <form action="{{ route('obat_masuk.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{$items->links()}}

    </div>
    <!-- /.container-fluid -->
@endsection