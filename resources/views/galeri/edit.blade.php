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
                <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control" name="judul" id="judul"
                                                placeholder="Judul" value="{{ $galeri->judul }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="jenis">Jenis</label>
                                            <select class="form-control" id="jenis" name="jenis">
                                                <option value="undangan_website"
                                                @if ($galeri->jenis == 'undangan_website')
                                                selected
                                                @endif>Undangan Website</option>
                                                <option value="undangan_video"
                                                @if ($galeri->jenis == 'undangan_video')
                                                selected
                                                @endif>Undangan Video</option>
                                                <option value="undangan_gambar"
                                                @if ($galeri->jenis == 'undangan_gambar')
                                                selected
                                                @endif>Undangan Gambar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="kode">Kode Item</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">Kode Item</span>
                                            </div>
                                            <input type="number" name="kode" id="kode" value="{{ $galeri->kode }}"
                                                class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
                                        </div>
                                        <p><span style="color: red;">*</span>Kode Item harus sama dengan nama template!</p>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="link_video">Link Video</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon3">https://www.youtube.com/watch?v=</span>
                                            </div>
                                            <input type="text" name="link_video" id="link_video" value="{{$galeri->link_video}}" placeholder="Kode Video Youtube" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="gambar">Gambar</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="gambar" name="gambar"
                                                        onchange="previewImg()">
                                                    <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p>Preview Image:</p>
                                @if (!$galeri->gambar)
                                    <img src="{{ asset('assets/images/imagedefault.png') }}" alt=""
                                        class="img-thumbnail img-preview">
                                @else
                                    <img src="{{ asset('assets/images/' . $galeri->gambar) }}" alt=""
                                        class="img-thumbnail img-preview">
                                @endif
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
    <script>
        function previewImg() {
            const gambar = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

    </script>
@endsection
