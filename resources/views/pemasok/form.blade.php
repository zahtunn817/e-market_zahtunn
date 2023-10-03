<!-- Modal -->
<div class="modal fade" id="form{{ $page }}Modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah {{ $page }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="pemasok">
                    @csrf
                    <div id="method"></div>
                    <div class="method"></div>
                    <div class="form-group">
                        <label for="nama_pemasok">Nama {{ $page }}</label>
                        <input type="text" class="form-control" id="nama_pemasok" name="nama_pemasok"
                            placeholder="Nama pemasok">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
