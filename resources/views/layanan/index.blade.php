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
                                <th>#</th>
                                <th class="text-center">Layanan</th>
                                <th width="10%" class="text-center">Status</th>
                                <th width="35%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x=1; ?>
                            @foreach ($layanan as $layanan)
                                <tr>
                                    <td><?php echo $x++; ?>.</td>
                                    <td><b>{{ $layanan->nama_layanan }}</b><br><i><?php echo
                                            html_entity_decode($layanan->keterangan); ?></i></td>
                                    <td class="text-center">@if ($layanan->status_layanan=="publish")
                                        <b class="text-success">Publish</b>
                                    @else
                                        <b class="text-warning">Draft</b>
                                    @endif</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('detail.show', $layanan->slug) }}"><i
                                                class="fa fa-plus"></i>
                                            Detail</a>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('harga.show', $layanan->slug) }}"><i class="fas fa-dollar-sign"></i>
                                            Harga</a>
                                        <a class="btn btn-primary btn-sm"
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
