<!-- Modal -->
<div class="modal fade" id="modalHapus{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title " id="exampleModalLabel">Hapus {{$title}} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="row">
                    <div class="col-6">Nama</div>
                    <div class="col-6">: <strong>{{ $item->nama }}</strong></div>
                </div>
                <div class="row">
                    <div class="col-6">Email</div>
                    <div class="col-6">: <strong>{{ $item->email }}</strong></div>
                </div>
                <div class="row">
                    <div class="col-6">Jabatan</div>
                    <div class="col-6">: <strong>{{ $item->jabatan }}</strong></div>
                </div>
                <div class="row">
                    <div class="col-6">Status</div>
                    <div class="col-6">: <strong>{{ $item->is_tugas ? 'Sudah Ditugaskan' : 'Belum Ditugaskan' }}</strong></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Tutup</button>
                <form action="{{ route('userDelete', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash mr-2"></i>Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>