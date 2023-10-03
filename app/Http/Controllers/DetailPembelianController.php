<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\Barang;
use App\Models\Pemasok;
use App\Http\Requests\StoreDetailPembelianRequest;
use App\Http\Requests\UpdateDetailPembelianRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDOException;
use Exception;

class DetailPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailPembelianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailPembelianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPembelian $detailPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPembelian $detailPembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailPembelianRequest  $request
     * @param  \App\Models\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDetailPembelianRequest $request, DetailPembelian $detailPembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPembelian $detailPembelian)
    {
        //
    }
}
