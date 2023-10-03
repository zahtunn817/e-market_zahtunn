<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDOException;
use Exception;

class ProdukController extends Controller
{
    public function index()
    {
        try {
            $data['produk'] = Produk::get();
            return view('produk.index', [
                'page' => 'Produk',
                'call' => 'produk'
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }



    public function store(StoreProdukRequest $request)
    {
        try {
            DB::beginTransaction();
            Produk::create($request->all());

            DB::commit();


            return redirect('produk')->with('success', 'Data produk berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }


    public function update(StoreProdukRequest $request, Produk $produk)
    {
        try {
            DB::beginTransaction();
            $produk->update($request->all());
            DB::commit();
            return redirect('produk')->with('success', 'Data produk berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }


    public function destroy(Produk $produk)
    {
        try {
            DB::beginTransaction();
            $produk->delete();
            DB::commit();
            return redirect('produk')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }
}
