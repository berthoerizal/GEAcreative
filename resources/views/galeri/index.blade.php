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
                    <a href="{{ route('galeri.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                        Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">Gambar</th>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Tanggal Upload</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galeri as $galeri)
                                <tr>
                                    <td>
                                        @if (!$galeri->gambar)
                                            <img src="{{ asset('assets/images/imagedefault.png') }}"
                                                class="img img-responsive img-thumbnail" width="100px">
                                        @else
                                            @include('galeri.modal_image')
                                        @endif
                                    </td>
                                    <td><b>{{ $galeri->judul }}</b><br><i>Oleh: {{ $galeri->name }}</i></td>
                                    <td class="text-center"><b>{{ $galeri->jenis }}</b></td>
                                    <td class="text-center"><?php echo date('d M Y',
                                        strtotime($galeri->created_at)); ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('galeri.edit', $galeri->slug) }}"><i
                                                class="fa fa-pencil-alt"></i> Edit</a>
                                        @include('galeri.delete')
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
