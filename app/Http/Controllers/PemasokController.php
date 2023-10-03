<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDOException;
use Exception;


class PemasokController extends Controller
{
    public function index()
    {
        try {
            $data['pemasok'] = Pemasok::get();
            return view('pemasok.index', [
                'page' => 'Pemasok',
                'call' => 'pemasok'
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function store(StorePemasokRequest $request)
    {
        try {
            DB::beginTransaction();
            Pemasok::create($request->all());

            DB::commit();


            return redirect('pemasok')->with('success', 'Data pemasok berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StorePemasokRequest $request, Pemasok $pemasok)
    {
        try {
            DB::beginTransaction();
            $pemasok->update($request->all());
            DB::commit();
            return redirect('pemasok')->with('success', 'Data pemasok berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }

    public function destroy(Pemasok $pemasok)
    {
        try {
            DB::beginTransaction();
            $pemasok->delete();
            DB::commit();
            return redirect('pemasok')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }
}
