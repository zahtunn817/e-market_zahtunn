@extends('templates.layout')

@push('style')
@endpush

@section('content')
    <!-- Button trigger modal -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <div class="col-md-9 col-sm-9 col-xs-12">
                <button type="button" class=" btn btn-info" id="tambahBarangBtn" data-toggle="modal"
                    data-target="#tblBarangModal">Cetak Faktur</button>
            </div>
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

    <form method="POST" action="transaksiPenjualan" id="formTransaksi">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="no-faktur" class="col-4 col-form-label col-form-label-sm">No Faktur</label>
                <div class="col-8"><input type="text" name="no_faktur" id="no-faktur"
                        class="form-control form-control-sm" placeholder="" readonly value="{{ $no_faktur }}"></div>
            </div>
            <div class="col-6">
                <label class="control-label col-md-6 col-sm-6 col-xs-12">Tanggal Penjualan</label>
                <div class="col-md-6 col-sm-6 col-xs-12"><input type="date" name="tgl_faktur" id="tanggal-penjualan"
                        class="date-picker form-control col-md-7 col-xs-12" required="required" value="{{ date('Y-m-d') }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label for="" class="control-label col-md-3 col-sm-3 col-xs-12
                ">&nbsp;</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <button type="button" class=" btn btn-primary" id="tambahBarangBtn" data-toggle="modal"
                        data-target="#tblBarangModal">Tambah Barang</button>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                <label for="" class="control-label col-md-3 col-sm-3 col-xs-12
                ">Pelanggan</label>
                <div class="col-md-6 col-sm-9 col-xs-12"><select class="form-control col-md-4 col-xs-12" required="required"
                        name="pelanggan_id">
                        @foreach ($pelanggan as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_pelanggan }}</option>
                        @endforeach
                    </select></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Barang</h3>
                <table id="tblTransaksi" class="table table-stripped table-bordered bulk_action">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td colspan="6" style="text-align:center; font-style:italic">Belum ada data</td>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-end">
            <label for="" class="control-label col-md-2 col-sm-2 offset-md-7">Total Harga</label>
            <div class="col-md-3 mr-md-auto" style="padding-right:0px; align-content:right;">
                <input readonly type="text" id="total_bayar" name="total_bayar" required="required"
                    style="margin-left:80px;" class="form-control col-md-8 col-xs-12">
            </div>
        </div>
        <div class="row justify-content-end">
            <label for="" class="control-label col-md-2 col-sm-2 offset-md-7">Uang Terima</label>
            <div class="col-md-3 mr-md-auto" style="padding-right:0px; align-content:right;">
                <input type="number" id="bayar" name="bayar" value="" style="margin-left:80px;"
                    class="form-control col-md-8 col-xs-12">
            </div>
        </div>
        <div class="row justify-content-end">
            <label for="" class="control-label col-md-2 col-sm-2 offset-md-7">Uang Kembali</label>
            <div class="col-md-3 mr-md-auto" style="padding-right:0px; align-content:right;">
                <input type="text" id="kembali" name="kembali" style="margin-left:80px;"
                    class="form-control col-md-8 col-xs-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12"
                style="text-align:right; margin-right:0; padding-right:0; margin-top:20px;">
                <div class="col-md-12 col-sm-9 col-xs-12">
                    <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                </div>
            </div>
        </div>
    </form>


    @include('transaksiPenjualan.modal')
@endsection
@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte3') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('adminlte3') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
        $(function() {
            $('#tblBarang2').DataTable()

            $('#tblBarangModal').on('click', '.pilihBarangBtn', function() {
                tambahBarang(this);
            });
            $('#tblTransaksi').on('change', '.qty', function(e) {
                console.log('qty')
                calcSubTotal(e.target);
            });
            $('#formTransaksi').on('change', '.bayar', function(e) {
                console.log('bayar')
                calcKembali(e.target);
            });
            $('#tblTransaksi').on('click', '.btnRemoveBarang', function() {
                if (tbody == 0) {
                    $('#tblTransaksi tbody').append(
                        '<td colspan="6" style="text-align:center; font-style:italic">Belum ada data</td>'
                    );
                } else {
                    let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
                    total_bayar -= subTotalAwal;

                    $currentRow = $(this).closest('tr').remove();
                    $('#total_bayar').val(total_bayar);

                    let tbody = Number($('#tblTransaksi tbody').text());
                };
            });
            $('#formTransaksi').on('change', '.bayar', function(e) {
                console.log('bayar')
                calcKembali(e.target);
            });
        })

        let total_bayar = 0;
        let kembali = 0;

        function tambahBarang(a) {
            let d = $(a).closest('tr');
            let kodeBarang = d.find('td:eq(1)').text();
            let namaBarang = d.find('td:eq(2)').text();
            let hargaBarang = d.find('td:eq(3)').text();
            let idBarang = d.find('.idBarang').val();
            let data = '';
            let tbody = $('#tblTransaksi tbody tr td').text();
            data += '<tr>';
            data += '<td>' + kodeBarang + '</td>';
            data += '<td>' + namaBarang + '</td>';
            data += '<td>' + hargaBarang + '</td>';
            data += '<input type="hidden" name="barang_id[]" value="' + idBarang + '">'
            data += '<input type="hidden" name="harga_jual[]" value="' + hargaBarang + '">'
            data += '<td><input type="number" value="1" min="1" class="qty" name="jumlah[]"></td>'
            data += '<td><input type="text" readonly value="' + hargaBarang + '" class="subTotal" name="subtotal[]"></td>'
            data += '<td><button type="button" class="btnRemoveBarang"><span class="fas fa-times"></span></button></td>';
            data += '</tr>';

            if (tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();

            $('#tblTransaksi tbody').append(data);
            total_bayar += parseFloat(hargaBarang);
            $('#total_bayar').val(total_bayar);
            $('#tblBarangModal').modal('hide');


        }

        function calcSubTotal(a) {
            let qty = parseInt($(a).closest('tr').find('.qty').val());
            let hargaBarang = parseFloat($(a).closest('tr').find('td:eq(2)').text());
            let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
            let subTotal = qty * hargaBarang;
            total_bayar += subTotal - subTotalAwal;
            kembali = bayar - total_bayar;
            $(a).closest('tr').find('.subTotal').val(subTotal);
            $('#total_bayar').val(total_bayar);
        }

        function calcKembali() {
            let bayar = parseFloat($('#bayar').val());
            kembali = bayar - total_bayar;
            $('#kembali').text(kembali);
        }
    </script>
@endpush
