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
                    <a href="{{ route('layanan.index') }}" class="btn btn-primary btn-sm"> <i
                            class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
                <div class="float-right">
                    @include('detail.create')
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="10%" class="text-center">Gambar</th>
                                <th class="text-center">Keterangan</th>
                                <th width="20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x=1; ?>
                            @foreach ($detail as $detail)
                                <tr>
                                    <td><?php echo $x++; ?>.</td>
                                    <td>
                                        @if (!$detail->gambar)
                                            <img src="{{ asset('assets/images/imagedefault.png') }}"
                                                class="img img-responsive img-thumbnail" width="100px">
                                        @else
                                            <img src="{{ asset('assets/images/' . $detail->gambar) }}"
                                                class="img img-responsive img-thumbnail" width="100px">
                                        @endif
                                    </td>
                                    <td><i><?php echo html_entity_decode($detail->keterangan); ?></i></td>
                                    <td>
                                        @include('detail.edit')
                                        @include('detail.delete')
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
