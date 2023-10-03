@extends('templates.layout')

@push('style')
@endpush

@section('content')
    <!-- Button trigger modal -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
        data-bs-target="#form{{ $page }}Modal">
        Tambah {{ $page }}
    </button>

    @include('user.data')
@endsection

@include('user.form')
@push('script')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        });

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let name = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red"><b>${name}</b></span> akan dihapus?`,
                text: "Data tidak bisa dikembalikan!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: 'd33',
                confirmButtonText: 'Ya, hapus data ini!'
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        })

        $('#form{{ $page }}Modal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            console.log(btn.data('mode'))
            const mode = btn.data('mode')
            const name = btn.data('name')
            const email = btn.data('email')
            const password = btn.data('password')
            const akses_id = btn.data('akses_id')
            const id = btn.data('id')
            const modal = $(this)
            console.log(mode)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Petugas')
                modal.find('#name').val(name)
                modal.find('#email').val(email)
                modal.find('#password').val(password)
                modal.find('#akses_id').val(akses_id)
                modal.find('.modal-body form').attr('action', '{{ url('user') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Data Petugas')
                modal.find('#name').val('')
                modal.find('#email').val('')
                modal.find('#password').val('')
                modal.find('#akses_id').val('')
                modal.find('.modal-body form').attr('action', '{{ url('user') }}')
                modal.find('#method').html('')
            }
        })
    </script>
@endpush
