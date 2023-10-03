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

    @include('produk.data')
@endsection

@include('produk.form')
@push('script')
    <script>
        $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
            $('.alert-success').slideUp(500)
        });

        $('.delete-data').on('click', function(e) {
            e.preventDefault()
            let nama_produk = $(this).closest('tr').find('td:eq(1)').text()
            Swal.fire({
                title: `Apakah data <span style="color:red"><b>${nama_produk}</b></span> akan dihapus?`,
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
            const nama_produk = btn.data('nama_produk')
            const id = btn.data('id')
            const modal = $(this)
            console.log(mode)
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data Produk')
                modal.find('#nama_produk').val(nama_produk)
                modal.find('.modal-body form').attr('action', '{{ url('produk') }}/' + id)
                modal.find('#method').html('@method('PATCH')')
            } else {
                modal.find('.modal-title').text('Input Data Produk')
                modal.find('#nama_produk').val('')
                modal.find('.modal-body form').attr('action', '{{ url('produk') }}')
                modal.find('#method').html('')
            }
        })
        // $('#tbl-data-produk').DataTable()
    </script>
@endpush
