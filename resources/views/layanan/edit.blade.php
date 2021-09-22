@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        @include('partial.message')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
        <hr>
        {{-- $fillable = ['nama_layanan', 'slug', 'keterangan', 'gambar', 'status_layanan']
        --}}
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-left">
                    <a href="{{ route('layanan.index') }}" class="btn btn-primary btn-sm"><i
                            class="fa fa-arrow-circle-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_layanan">Nama Layanan</label>
                                    <input type="text" class="form-control" name="nama_layanan" id="nama_layanan"
                                        placeholder="Nama Layanan" value="{{ $layanan->nama_layanan }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_layanan">Status</label>
                                    <select class="form-control" id="status_layanan" name="status_layanan">
                                        <option value="publish" @if ($layanan->status_layanan == 'publish')
                                            selected
                                            @endif>Publish</option>
                                        <option value="draft" @if ($layanan->status_layanan == 'draft')
                                            selected
                                            @endif>Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control textarea-tinymce"
                                        cols="30" rows="10">{{ $layanan->keterangan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary btn-sm">Reset</button>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
