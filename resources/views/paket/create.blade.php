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
            <form action="{{ route('harga.store') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id_layanan" value="{{ $layanan->id }}" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control form-control-sm" name="nama_paket" id="nama_paket"
                            value="{{ old('nama_paket') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kata">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control textarea-tinymce"
                            rows="5">{{ old('keterangan') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Rp.</span>
                                    </div>
                                    <input type="number" name="harga" id="harga" class="form-control" id="basic-url"
                                        value="{{ old('harga') }}" aria-describedby="basic-addon3">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <div class="input-group">
                                    <input type="number" name="diskon" id="diskon" class="form-control" id="basic-url"
                                        value="{{ old('diskon') }}" aria-describedby="basic-addon3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">%</span>
                                    </div>
                                </div>
                            </div>
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
