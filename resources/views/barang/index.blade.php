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
    @include('barang.data')

    @push('style')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    @endpush

    @push('script')
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('adminlte3') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/jszip/jszip.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{ asset('adminlte3') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script>
            $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
                $('.alert-success').slideUp(500)
            });

            $('.delete-data').on('click', function(e) {
                e.preventDefault()
                let nama_barang = $(this).closest('tr').find('td:eq(2)').text()
                Swal.fire({
                    title: `Apakah data <span style="color:red"><b>${nama_barang}</b></span> akan dihapus?`,
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
                const kode_barang = btn.data('kode_barang')
                const nama_barang = btn.data('nama_barang')
                const satuan = btn.data('satuan')
                const harga_jual = btn.data('harga_jual')
                const stok = btn.data('stok')
                const ditarik = btn.data('ditarik')
                const user_id = btn.data('user_id')
                const produk_id = btn.data('produk_id')
                const id = btn.data('id')
                const modal = $(this)
                console.log(mode)
                if (mode === 'edit') {
                    modal.find('.modal-title').text('Edit Data barang')
                    modal.find('#kode_barang').val(kode_barang)
                    modal.find('#nama_barang').val(nama_barang)
                    modal.find('#satuan').val(satuan)
                    modal.find('#harga_jual').val(harga_jual)
                    modal.find('#stok').val(stok)
                    modal.find('#stok').val(stok)
                    modal.find('#ditarik').val(ditarik)
                    modal.find('#ditarik').val(ditarik)
                    modal.find('#user_id').val(user_id)
                    modal.find('#user_id').val(user_id)
                    modal.find('#produk_id').val(produk_id)
                    modal.find('.modal-body form').attr('action', '{{ url('barang') }}/' + id)
                    modal.find('#method').html('@method('PATCH')')
                } else {
                    modal.find('.modal-title').text('Input Data barang')
                    modal.find('#kode_barang').val('')
                    modal.find('#nama_barang').val('')
                    modal.find('#satuan').val('')
                    modal.find('#harga_jual').val('')
                    modal.find('#stok').val('')
                    modal.find('#ditarik').val('')
                    modal.find('#user_id').val('')
                    modal.find('#produk_id').val('')
                    modal.find('.modal-body form').attr('action', '{{ url('barang') }}')
                    modal.find('#method').html('')
                }
            })
        </script>
    @endpush

    @include('barang.form')
@endsection
