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
                <form method="post" action="produk">
                    @csrf
                    <div id="method"></div>
                    <div class="method"></div>
                    <div class="form-group">
                        <label for="kode_pelanggan">Kode</label>
                        <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan"
                            placeholder="Kode">
                    </div>
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama {{ $page }}</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan"
                            placeholder="Nama Pelanggan">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp"
                            placeholder="No Telepon">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
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
