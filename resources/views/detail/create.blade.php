<a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#tambahModal">
    <i class="fa fa-plus"></i>
    Tambah
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('detail.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id_layanan" value="{{ $layanan->id }}" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kata">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control textarea-tinymce"
                            rows="5">{{ old('keterangan') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label><br>
                        <input type="file" id="gambar" name="gambar" required>
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
