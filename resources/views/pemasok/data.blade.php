@push('style')
@endpush

<table id="datatable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Pemasok</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemasok as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_pemasok }}</td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formpemasokModal"
                        data-mode="edit" data-id="{{ $p->id }}" data-nama_pemasok="{{ $p->nama_pemasok }}">
                        <i class='fas fa-edit'></i>
                    </button>
                    <form action="{{ route('pemasok.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data"
                            data-nama_pemasok="{{ $p->nama_pemasok }}">
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
