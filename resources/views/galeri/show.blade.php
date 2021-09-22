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
                    <a href="{{ route('galeri.index') }}" class="btn btn-primary btn-sm"><i
                            class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td><b>Diupload Oleh</b></td>
                                            <td>{{$galeri->name}}</td>
                                        </tr>
                                        <tr>
                                            <td width="30%"><b>Judul</b></td>
                                            <td>{{$galeri->judul}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Layanan</b></td>
                                            <td>{{$galeri->nama_layanan}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal Upload</b></td>
                                            <td>{{date("d F Y", strtotime($galeri->created_at))}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if (!$galeri->link_video)
                            <img src="{{ asset('assets/images/'.$galeri->gambar) }}" alt="" class="img-thumbnail img-preview">
                            @else
                            <div class="border border-primary">
                                <div class="embed-responsive embed-responsive-1by1">
                                    <iframe width="420" height="250" src="https://www.youtube.com/embed/{{$galeri->link_video}}" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
