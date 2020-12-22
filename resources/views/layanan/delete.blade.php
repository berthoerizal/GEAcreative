<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteModal{{ $layanan->id }}">
    <i class="fa fa-trash-alt"></i>
    Hapus
</a>
<!-- Tambah Modal-->
<div class="modal fade" id="deleteModal{{ $layanan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Layanan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Yakin ingin menghapus <b>{{ $layanan->nama_layanan }}</b> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <form action="{{ route('layanan.destroy', $layanan->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger btn-sm" type="submit" value="Hapus" />
                </form>
            </div>
        </div>
    </div>
</div>
