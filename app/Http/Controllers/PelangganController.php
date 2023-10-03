<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDOException;
use Exception;

class PelangganController extends Controller
{
    public function index()
    {
        try {
            $data['pelanggan'] = Pelanggan::get();
            return view('pelanggan.index', [
                'page' => 'Pelanggan',
                'call' => 'pelanggan'
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function store(StorePelangganRequest $request)
    {
        try {
            DB::beginTransaction();
            Pelanggan::create($request->all());

            DB::commit();


            return redirect('pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StorePelangganRequest $request, Pelanggan $pelanggan)
    {
        try {
            DB::beginTransaction();
            $pelanggan->update($request->all());
            DB::commit();
            return redirect('pelanggan')->with('success', 'Data pelanggan berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }

    public function destroy(Pelanggan $pelanggan)
    {
        try {
            DB::beginTransaction();
            $pelanggan->delete();
            DB::commit();
            return redirect('pelanggan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }
}
