<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use App\Models\User;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDOException;
use Exception;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['barang'] = Barang::get();
            $data['produk'] = Produk::get();
            $data['user'] = User::get();
            return view('barang.index', [
                'page' => 'Barang',
                'call' => 'barang'
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function store(StoreBarangRequest $request)
    {
        try {
            DB::beginTransaction();
            Barang::create($request->all());

            DB::commit();


            return redirect('barang')->with('success', 'Data barang berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StoreBarangRequest $request, Barang $barang)
    {
        try {
            DB::beginTransaction();
            $barang->update($request->all());
            DB::commit();
            return redirect('barang')->with('success', 'Data barang berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }

    public function destroy(Barang $barang)
    {
        try {
            DB::beginTransaction();
            $barang->delete();
            DB::commit();
            return redirect('barang')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }
}
