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
                </div>
            </div>
            <div class="card-body">
                <div class="modal-body">
                    <form action="{{ route('konfigurasi.update', $konfig->id) }}" method="POST">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="author">Author</label>
                                        <input type="text" class="form-control form-control" name="author" id="author"
                                            placeholder="Author" value="{{ $konfig->author }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaweb">Nama Website</label>
                                        <input type="text" class="form-control form-control" name="namaweb" id="namaweb"
                                            placeholder="Nama Website" value="{{ $konfig->namaweb }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">Keywords</label>
                                        <input type="text" class="form-control form-control" name="keywords" id="keywords"
                                            placeholder="Keywords" value="{{ $konfig->keywords }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control form-control"
                                            id="alamat">{{ $konfig->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="lokasi_googlemaps">Google Maps</label>
                                        <textarea name="lokasi_googlemaps" class="form-control form-control"
                                            id="lokasi_googlemaps">{{ $konfig->lokasi_googlemaps }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <iframe src="{{ $konfig->lokasi_googlemaps }}" width="100%" height="100%" frameborder="0"
                                        style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc1">Deskripsi 1</label>
                                        <textarea name="desc1" id="desc1" class="form-control" cols="30"
                                            rows="3">{{ $konfig->desc1 }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc2">Deskripsi 2</label>
                                        <textarea name="desc2" id="desc2" class="form-control textarea-tinymce" cols="30"
                                            rows="10">{{ $konfig->desc2 }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control" name="email" id="email"
                                            placeholder="Email" value="{{ $konfig->email }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="nomor_hp">Nomor Telepon/Hp</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon3">+62</span>
                                        </div>
                                        <input type="number" name="nomor_hp" id="nomor_hp" value="{{ $konfig->nomor_hp }}"
                                            class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control form-control" name="instagram" id="instagram"
                                            placeholder="instagram" value="{{ $konfig->instagram }}" required>
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
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
