@extends('layouts.admin.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kasir</h1>
        </div>

        

        <div class="row">
            <div class="card-body">
                <table class="table table-striped table-dark" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Kode Resep</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Harga Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_pasien }}</td>
                                
                                <td>{{ $item->kode_resep }}</td>
                                <td>{{ $item->tanggal_pembelian}}</td>
                                <td>{{ $item->harga_pembelian}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="5">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection