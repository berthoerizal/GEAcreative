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
                <div class="float-right">
                    <a href="{{ route('layanan.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">Gambar</th>
                                <th>Layanan</th>
                                <th width="10%">Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($layanan as $layanan)
                                <tr>
                                    <td>
                                        @if (!$layanan->gambar)
                                            <img src="{{ asset('assets/images/imagedefault.png') }}"
                                                class="img img-responsive img-thumbnail" width="100px">
                                        @else
                                            <img src="{{ asset('assets/images/' . $layanan->gambar) }}"
                                                class="img img-responsive img-thumbnail" width="100px">
                                        @endif
                                    </td>
                                    <td><b>{{ $layanan->nama_layanan }}</b><br><i><?php echo
                                            html_entity_decode($layanan->keterangan); ?></i></td>
                                    <td>{{ $layanan->status_layanan }}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('layanan.edit', $layanan->slug) }}"><i
                                                class="fa fa-pencil-alt"></i> Edit</a>
                                        @include('layanan.delete')
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