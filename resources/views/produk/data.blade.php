@push('style')
@endpush

<table id="datatable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Produk</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($produk as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formProdukModal"
                        data-mode="edit" data-id="{{ $p->id }}" data-nama_produk="{{ $p->nama_produk }}">
                        <i class='fas fa-edit'></i>
                    </button>
                    <form action="{{ route('produk.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data"
                            data-nama_produk="{{ $p->nama_produk }}">
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
