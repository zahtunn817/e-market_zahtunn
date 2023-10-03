@push('style')
@endpush

<table id="datatable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Level</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $u)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->akses_id }}</td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#form{{ $page }}Modal" data-mode="edit" data-id="{{ $u->id }}"
                        data-name="{{ $u->name }}" data-email="{{ $u->email }}"
                        data-password="{{ $u->password }}" data-akses_id="{{ $u->akses_id }}">
                        <i class='fas fa-edit'></i>
                    </button>
                    <form action="{{ route('user.destroy', $u->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data" data-nama_user="{{ $u->name }}">
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
