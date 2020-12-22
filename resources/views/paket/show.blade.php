@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        @include('partial.message')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
        <hr>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-left">
                    <a href="{{ route('layanan.index') }}" class="btn btn-primary btn-sm"> <i
                            class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
                <div class="float-right">
                    @include('paket.create')
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Total Harga</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paket as $paket)
                                <tr>
                                    <td><b>{{ $paket->nama_paket }}</b></td>
                                    <td><?php echo html_entity_decode($paket->keterangan); ?>
                                    </td>
                                    <td>Rp. {{ number_format($paket->harga, 2, ',', '.') }}</td>
                                    <td class="text-center"><b>
                                            @if (!$paket->diskon)
                                                0%
                                            @else
                                                {{ $paket->diskon }}%
                                            @endif
                                        </b></td>
                                    <td>Rp.
                                        @if (!$paket->diskon)
                                            <?php echo number_format($paket->harga, 2, ',', '.'); ?>
                                        @else
                                            <?php
                                            $hasil_diskon = ($paket->harga * $paket->diskon) / 100;
                                            $total_harga = abs($paket->harga - $hasil_diskon);
                                            echo number_format($total_harga, 2, ',', '.');
                                            ?>
                                        @endif
                                    </td>
                                    <td>
                                        @include('paket.edit')
                                        @include('paket.delete')
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
