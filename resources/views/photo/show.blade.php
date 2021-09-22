@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

        @include('partial.message')

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">{{$title}}</h1><hr>

       <!-- DataTales Example -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="float-left">
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"><i
                        class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
            <div class="float-right">
                @include('photo.create')
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($photo as $data)
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <img class="card-img-top" src="{{asset('assets/images/'.$data->gambar)}}" width="100%" height="100%">
                  </div>
                <div class="card-body">
                    <h6 class="card-title"><b>{{$data->judul}}</b></h6>
                    <p style="font-size: 12px;">{{date('d F Y', strtotime($data->created_at))}}</p>
                </div>
                <div class="card-footer text-muted">
                    @if (Auth::user()->id_role == 'admin')
                        @include('photo.edit')
                        @include('photo.delete')
                    @endif
                    <a href="{{route('downloadphoto', $data->id)}}" class="btn btn-dark btn-sm"><i class="fa fa-download"></i> Download</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                {!! $photo->links() !!}
            </div>
        </div>
    </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection
