@push('style')
@endpush

<table id="datatable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Nama Barang</td>
            <td>Produk</td>
            <td>Satuan</td>
            <td>Harga Jual</td>
            <td>Stok</td>
            <td>Ditarik</td>
            <td>Petugas</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($pembelian as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->kode_barang }}</td>
                <td>{{ $p->barang_id }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->satuan }}</td>
                <td>{{ $p->harga_jual }}</td>
                <td>{{ $p->stok }}</td>
                <td>{{ $p->ditarik }}</td>
                <td>{{ $p->user_id }}</td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#form{{ $page }}Modal" data-mode="edit" data-id="{{ $p->id }}"
                        data-kode_barang="{{ $p->kode_barang }}" data-nama_barang="{{ $p->nama_barang }}"
                        data-satuan="{{ $p->satuan }}" data-harga_jual="{{ $p->harga_jual }}"
                        data-stok="{{ $p->stok }}" data-ditarik="{{ $p->ditarik }}"
                        data-user_id="{{ $p->user_id }}" data-produk_id="{{ $p->produk_id }}">
                        <i class='fas fa-edit'></i>
                    </button>
                    <form action="{{ route('barang.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data"
                            data-nama_barang="{{ $p->nama_barang }}">
                            <i class='fas fa-trash'></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('script')
    <script>
        $(function() {
            $("#datatable").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#datatable .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
