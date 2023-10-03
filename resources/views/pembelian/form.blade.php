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
                        <label for="kode_barang">Kode</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang"
                            placeholder="Kode">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama {{ $page }}</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            placeholder="Nama barang">
                    </div>
                    <div class="form-group">
                        <label for="username">Produk</label>
                        <select name="produk_id" id="produk_id" class="form-select">
                            <option value="">- Pilih -</option>
                            @foreach ($pembelian as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual"
                            placeholder="Harga Jual">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok">
                    </div>
                    <div class="form-group">
                        <label for="ditarik">Ditarik</label>
                        <input type="number" class="form-control" id="ditarik" name="ditarik" placeholder="Ditarik">
                    </div>
                    <div class="form-group">
                        <label for="username">Petugas</label>
                        <select name="user_id" id="user_id" class="form-select">
                            <option value="">- Pilih -</option>
                            @foreach ($user as $u)
                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
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
