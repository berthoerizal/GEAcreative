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
                                <th>#</th>
                                <th width="10%" class="text-center">Gambar</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Jenis</th>
                                <th class="text-center">Tanggal Upload</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galeri as $galeri)
                                <tr>
                                    <td class="text-center">
                                        {{$galeri->kode}}
                                    </td>
                                    <td>
                                        @if (!$galeri->gambar)
                                            <img src="{{ asset('assets/images/imagedefault.png') }}"
                                                class="img img-responsive img-thumbnail" width="100px">
                                        @else
                                            @include('galeri.modal_image')
                                        @endif
                                    </td>
                                    <td><b>{{ $galeri->judul }}</b><br><i>Oleh: {{ $galeri->name }}</i></td>
                                    <td class="text-center"><b>
                                        @if ($galeri->jenis=="undangan")
                                            Undangan
                                        @endif</b></td>
                                    <td class="text-center"><?php echo date('d M Y',
                                        strtotime($galeri->created_at)); ?></td>
                                    <td>
                                        @if(Auth::user()->id == $galeri->id_user)
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('galeri.edit', $galeri->slug) }}"><i
                                                    class="fa fa-pencil-alt"></i> Edit</a>
                                            @include('galeri.delete')
                                        @else
                                            <button type="button" class="btn btn-primary btn-sm" disabled><i class="fa fa-pencil-alt"></i> Edit</button>
                                            <button type="button" class="btn btn-danger btn-sm" disabled><i class="fa fa-trash-alt"></i> Hapus</button>
                                        @endif
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
