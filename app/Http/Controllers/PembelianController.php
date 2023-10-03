<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Barang;
use App\Models\DetailPembelian;
use App\Models\Pemasok;
use App\Models\User;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDOException;
use Exception;

class PembelianController extends Controller
{
    public function index()
    {
        $lastID = Pembelian::select('kode_masuk')->orderBy('created_at', 'desc')->first();
        $data['kode'] = ($lastID == null ? 'P00000001' : sprintf('P%08d', substr(
            $lastID->kode_masuk,
            1
        ) + 1));
        $data['pemasok'] = Pemasok::get();
        $data['barang'] = Barang::get();

        return view('transaksiPembelian.index', [
            'page' => 'Pembelian',
            'call' => 'pembelian'
        ])->with($data);
    }

    public function store(StorePembelianRequest $request)
    {
        $data['kode_masuk'] = $request['kode_masuk'];
        $data['tanggal_masuk'] = $request['tanggal_masuk'];
        $data['total'] = $request['total'];
        $data['pemasok_id'] = $request['pemasok_id'];
        $data['user_id'] = 1;

        $input_pembelian = Pembelian::create($data);


        $barang_id = $request->barang_id;
        $harga_beli = $request->harga_beli;
        $jumlah = $request->jumlah;
        $sub_total = $request->sub_total;

        foreach ($barang_id as $i => $v) {
            $data2['pembelian_id'] = $input_pembelian->id;
            $data2['barang_id'] = $barang_id[$i];
            $data2['harga_beli'] = $harga_beli[$i];
            $data2['jumlah'] = $jumlah[$i];
            $data2['sub_total'] = $sub_total[$i];
            $input_detail_pembelian = DetailPembelian::create($data2);
        }
        return redirect('transaksiPembelian')->with('success', 'Input Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembelianRequest  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(StorePembelianRequest $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }

    public function print()
    {
        return view('transaksiPembelian.print');
    }
}
