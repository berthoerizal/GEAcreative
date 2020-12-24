@extends('layouts.app')

@section('content')
    <style>
        table {
            font-size: 12px;
        }

    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        @include('partial.message')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
        <hr>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    <a href="{{ route('pesanan.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">Tanggal Pesanan</th>
                                <th class="text-center">Pemesan</th>
                                <th class="text-center">Layanan</th>
                                <th class="text-center">Bayar</th>
                                <th class="text-center">Status</th>
                                <th width="30%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $pesanan)
                                <tr>
                                    <td>{{ date('d-F-Y', strtotime($pesanan->created_at)) }}</td>
                                    <td>{{ $pesanan->pemesan }}<br><i>Nomor Hp: +62{{ $pesanan->nomor_hp }}</i></td>
                                    <td><b>{{ $pesanan->nama_layanan }}</b><br><i>{{ $pesanan->nama_paket }}</i></td>
                                    <td>Rp. {{ number_format($pesanan->bayar, 2, ',', '.') }}</td>
                                    <td class="text-center">@if ($pesanan->status=="publish")
                                        <b class="text-success">Publish</b>
                                    @else
                                        <b class="text-warning">Draft</b>
                                    @endif</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('pesanan.edit', $pesanan->slug) }}"><i
                                                class="fa fa-pencil-alt"></i> Edit</a>
                                        <a class="btn btn-primary btn-sm" href="{{ route('photo.show', $pesanan->slug) }}"><i
                                                class="fa fa-image"></i>
                                            Photo</a>
                                        @include('pesanan.delete')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
