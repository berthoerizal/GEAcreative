<a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#editModal{{ $data->id }}">
    <i class="fa fa-pencil-alt"></i>
    Edit
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('photo.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <input type="hidden" name="id_pesanan" value="{{ $pesanan->id }}" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul Photo</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{$data->judul}}" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label><br>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
