<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\User;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDOException;
use Exception;

class PenjualanController extends Controller
{
    public function index()
    {
        $lastID = Penjualan::select('no_faktur')->orderBy('created_at', 'desc')->first();
        $data['no_faktur'] = ($lastID == null ? 'P00000001' : sprintf('P%08d', substr(
            $lastID->no_faktur,
            1
        ) + 1));
        $data['pelanggan'] = Pelanggan::get();
        $data['barang'] = Barang::get();

        return view('transaksiPenjualan.index', [
            'page' => 'Penjualan',
            'call' => 'penjualan'
        ])->with($data);
    }

    public function store(StorePenjualanRequest $request)
    {
        $data['no_faktur'] = $request['no_faktur'];
        $data['tgl_faktur'] = $request['tgl_faktur'];
        $data['total_bayar'] = $request['total_bayar'];
        $data['pelanggan_id'] = $request['pelanggan_id'];
        $data['user_id'] = 1;

        $input_penjualan = Penjualan::create($data);


        $barang_id = $request->barang_id;
        $harga_jual = $request->harga_jual;
        $jumlah = $request->jumlah;
        $subtotal = $request->subtotal;

        foreach ($barang_id as $i => $v) {
            $data2['penjualan_id'] = $input_penjualan->id;
            $data2['barang_id'] = $barang_id[$i];
            $data2['harga_jual'] = $harga_jual[$i];
            $data2['jumlah'] = $jumlah[$i];
            $data2['subtotal'] = $subtotal[$i];
            $input_detail_Penjualan = DetailPenjualan::create($data2);
        }
        return redirect('transaksiPenjualan')->with('success', 'Input Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $Penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $Penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjualanRequest  $request
     * @param  \App\Models\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(StorePenjualanRequest $request, Penjualan $Penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $Penjualan)
    {
        //
    }

    public function print()
    {
    }
}
