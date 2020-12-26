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
                    <div class="float-left">
                        <a href="{{ route('pesanan.index') }}" class="btn btn-primary btn-sm"><i
                                class="fa fa-arrow-circle-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <form action="{{ route('pesanan.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="pemesan">Nama Pemesan</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="pemesan" id="pemesan"
                                    value="{{ old('pemesan') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="nomor_hp">Nomor Hp</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3"><b
                                            style="font-size: 10px;">+62</b></span>
                                </div>
                                <input type="number" name="nomor_hp" id="nomor_hp" value="{{ old('nomor_hp') }}"
                                    class="form-control form-control-sm" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="kepada">Ditujukan Kepada</label>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control form-control-sm" name="kepada" id="kepada"
                                    value="{{ old('kepada') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="id_paket">Pilih Layanan | Paket | Harga</label>
                            <div class="form-group">
                                <select class="form-control select2" id="id_paket" name="id_paket">
                                    @foreach ($paket as $paket)
                                        <option value="{{$paket->id}}">{{$paket->nama_layanan}} | {{$paket->nama_paket}} | {{$paket->total_bayar}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_lengkap1">Nama Lengkap Pria</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="nama_lengkap1" id="nama_lengkap1"
                                    value="{{ old('nama_lengkap1') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_lengkap2">Nama Lengkap Wanita</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="nama_lengkap2" id="nama_lengkap2"
                                    value="{{ old('nama_lengkap2') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nama1">Nama Panggilan Pria</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="nama1" id="nama1"
                                    value="{{ old('nama1') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nama2">Nama Panggilan Wanita</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="nama2" id="nama2"
                                    value="{{ old('nama2') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="ayah1">Nama Ayah dari Pria</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="ayah1" id="ayah1"
                                    value="{{ old('ayah1') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="ayah2">Nama Ayah dari Wanita</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="ayah2" id="ayah2"
                                    value="{{ old('ayah2') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="ibu1">Nama Ibu dari Pria</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="ibu1" id="ibu1"
                                    value="{{ old('ibu1') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="ibu2">Nama Ibu dari Wanita</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="ibu2" id="ibu2"
                                    value="{{ old('ibu2') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="acara1">Acara ke-1</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="acara1" id="acara1"
                                    value="{{ old('acara1') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="lokasi1">Lokasi Acara ke-1</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="lokasi1" id="lokasi1"
                                    value="{{ old('lokasi1') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="tanggal1">Tanggal Acara ke-1</label>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-sm" name="tanggal1" id="tanggal1"
                                    value="{{ old('tanggal1') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="waktu1">Waktu Acara ke-1</label>
                            <div class="form-group">
                                <input type="time" class="form-control form-control-sm" name="waktu1" id="waktu1"
                                    value="{{ old('waktu1') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="acara2">Acara ke-2</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="acara2" id="acara2"
                                    value="{{ old('acara2') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="lokasi2">Lokasi Acara ke-2</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="lokasi2" id="lokasi2"
                                    value="{{ old('lokasi2') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="tanggal2">Tanggal Acara ke-2</label>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-sm" name="tanggal2" id="tanggal2"
                                    value="{{ old('tanggal2') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="waktu2">Tanggal Acara ke-2</label>
                            <div class="form-group">
                                <input type="time" class="form-control form-control-sm" name="waktu2" id="waktu2"
                                    value="{{ old('waktu2') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="lokasi_googlemaps">Lokasi di Google Maps (https://)</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="lokasi_googlemaps"
                                    id="lokasi_googlemaps" value="{{ old('lokasi_googlemaps') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="keterangan">Keterangan</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="keterangan"
                                    id="keterangan" value="{{ old('keterangan') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="quotes">Quotes</label>
                            <div class="form-group">
                                <textarea name="quotes" id="quotes" cols="30" rows="10" class="form-control textarea-tinymce">{{old('quotes')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_galeri">Template</label>
                                <select class="form-control form-control-sm" id="id_galeri" name="id_galeri">
                                    @foreach ($galeri as $galeri)
                                        <option value="{{$galeri->id}}">{{$galeri->judul}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="backsound">Backsound</label>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" name="backsound"
                                    id="backsound" value="{{ old('backsound') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control form-control-sm" id="status" name="status">
                                    <option value="publish">Publish</option>
                                    <option value="draft">Draft</option>
                                </select>
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
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Script -->
@endsection
