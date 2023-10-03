@push('style')
@endpush

<table id="datatable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>No Telepon</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->kode_pelanggan }}</td>
                <td>{{ $p->nama_pelanggan }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->no_telp }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#formpelangganModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-kode_pelanggan="{{ $p->kode_pelanggan }}" data-nama_pelanggan="{{ $p->nama_pelanggan }}"
                        data-alamat="{{ $p->alamat }}" data-no_telp="{{ $p->no_telp }}"
                        data-email="{{ $p->email }}" data-email="{{ $p->email }}">
                        <i class='fas fa-edit'></i>
                    </button>
                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data"
                            data-nama_pelanggan="{{ $p->nama_pelanggan }}">
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
