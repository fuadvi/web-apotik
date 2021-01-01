@extends('layouts.admin.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pasien</h1>
            <a href="{{ route("resep_details") }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-battery-quarter"></i> Show Details Resep Pasien
            </a>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <form action="{{route('cari_resep')}}" method="GET">
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
                            <th>Nama Pasien</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama_pasien }}</td>
                                <td>
                                    <a href="{{ route('resep_PasienDetail', $item->slug) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('resep.show', $item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                </td>
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
        {{$items->links()}}
    </div>
    <!-- /.container-fluid -->
@endsection