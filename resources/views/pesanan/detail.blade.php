@extends('layouts.app')

@section('content')
    <!-- Content Wrapper -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
        <hr />

        <!-- DataTales Example -->
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card" style="margin-right: 0px; padding-right: 0px;">
                    @if ($pesan->slug_layanan=="undangan-video")
                    <iframe src="https://www.youtube.com/embed/{{ $pesan->link_video }}"
                        class="img-fluid" frameborder="0" allowfullscreen></iframe>
                    @else
                    <img class="card-img-top" src="{{ asset('assets/images/' . $pesan->gambar) }}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{$pesan->judul}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">{{$pesan->nama_layanan}}</li>
                      <li class="list-group-item" style="font-style: italic;">{{$pesan->backsound}}</li>
                      <li class="list-group-item">
                            <?php
                            $hasil_diskon = ($pesan->harga * $pesan->diskon) / 100;
                            $total_harga = abs($pesan->harga - $hasil_diskon);
                            ?>
                            <b>Rp.<?php echo number_format($total_harga, 2, ',', '.'); ?></b>
                        </li>
                      <li class="list-group-item">
                        @if ($pesan->status == 'publish')
                        <b class="text-success">Publish</b>
                        @else
                        <b class="text-warning">Draft</b>
                        @endif
                      </li>
                    </ul>
                  </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">Info</a></li>
                      <li class="nav-item"><a class="nav-link" href="#acara" data-toggle="tab">Acara</a></li>
                      <li class="nav-item"><a class="nav-link" href="#quotes" data-toggle="tab">Quotes</a></li>
                      <li class="nav-item"><a class="nav-link" href="#peta" data-toggle="tab">Peta</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{ route('photo.show', $pesan->slug_pesanan) }}">Photo</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="info">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td colspan="2"><b>Informasi Pria</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="20%">Nama Lengkap</td>
                                        <td>{{$pesan->nama_lengkap1}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Panggilan</td>
                                        <td>{{$pesan->nama1}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ayah</td>
                                        <td>{{$pesan->ayah1}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>{{$pesan->ibu1}}</td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td colspan="2"><b>Informasi Wanita</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="20%">Nama Lengkap</td>
                                        <td>{{$pesan->nama_lengkap2}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Panggilan</td>
                                        <td>{{$pesan->nama2}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ayah</td>
                                        <td>{{$pesan->ayah2}}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>{{$pesan->ibu2}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>
                      <!-- /.tab-pane -->
    
                      <div class="tab-pane" id="acara">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td colspan="2"><b>Acara Pertama</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>{{$pesan->lokasi1}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td><?php echo date("d F Y", strtotime($pesan->tanggal1)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>{{$pesan->waktu1}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td colspan="2"><b>Acara Kedua</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>{{$pesan->lokasi2}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td><?php echo date("d F Y", strtotime($pesan->tanggal2)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>{{$pesan->waktu2}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>

                      <div class="tab-pane" id="quotes">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td><b>Quote 1</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>{{$pesan->quotes1}}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td><b>Quote 2</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>{!!$pesan->quotes!!}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>

                      <div class="tab-pane" id="peta">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td><b>Google Map</b></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {!!$pesan->lokasi_googlemaps!!}
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
        </div>
    </div>
    </div>
@endsection
