@extends('layouts.admin.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data resep </h1>
            <a href="{{ route("pasien.create") }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Pasien
            </a>
        </div> --}}

        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Obat</th>
                            <th>dosis</th>
                            <th>Jumlah obat di terima</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->pasien->nama_pasien }}</td>
                                <td>{{ $item->dokter->nama_dokter }}</td>
                                <td>{{ $item->obat->nama_obat }}</td>
                                <td>{{ $item->dosis }}%</td>
                                <td>{{ $item->jumlah }}</td>
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