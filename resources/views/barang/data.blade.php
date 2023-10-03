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
        @foreach ($barang as $b)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $b->kode_barang }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->nama_produk }}</td>
                <td>{{ $b->satuan }}</td>
                <td>{{ $b->harga_jual }}</td>
                <td>{{ $b->stok }}</td>
                <td>{{ $b->ditarik }}</td>
                <td>{{ $b->user_id }}</td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#form{{ $page }}Modal" data-mode="edit" data-id="{{ $b->id }}"
                        data-kode_barang="{{ $b->kode_barang }}" data-nama_barang="{{ $b->nama_barang }}"
                        data-satuan="{{ $b->satuan }}" data-harga_jual="{{ $b->harga_jual }}"
                        data-stok="{{ $b->stok }}" data-ditarik="{{ $b->ditarik }}"
                        data-user_id="{{ $b->user_id }}" data-produk_id="{{ $b->produk_id }}">
                        <i class='fas fa-edit'></i>
                    </button>
                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data"
                            data-nama_barang="{{ $b->nama_barang }}">
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
