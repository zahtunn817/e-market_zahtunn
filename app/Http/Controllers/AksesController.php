<?php

namespace App\Http\Controllers;

use App\Models\Akses;
use App\Http\Requests\StoreAksesRequest;
use App\Http\Requests\UpdateAksesRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use PDOException;
use Exception;


class AksesController extends Controller
{
    public function index()
    {
        try {
            $data['akses'] = Akses::get();
            return view('akses.index', [
                'page' => 'Hak Akses',
                'call' => 'akses'
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function store(StoreAksesRequest $request)
    {
    }

    public function update(UpdateAksesRequest $request, Akses $akses)
    {
        //
    }

    public function destroy(Akses $akses)
    {
        //
    }
}
