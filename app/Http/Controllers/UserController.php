<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Akses;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use PDOException;
use Exception;


class UserController extends Controller
{
    public function login()
    {
        if ($user = Auth::user()) {
            switch ($user->akses_id) {
                case '1':
                    return redirect()->intended('/');
                    break;
                case '2':
                    return redirect()->intended('/barang');
                    break;
                case '3':
                    return redirect()->intended('/pembelian');
                    break;
            }
        }
        return view('auth.login', [
            'page' => 'Login',
            'call' => 'login'
        ]);
    }
    public function cekLogin(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        $request->session()->regenerate();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            switch ($user->akses_id) {
                case '1':
                    return redirect()->intended('/');
                    break;
                case '2':
                    return redirect()->intended('/barang');
                    break;
                case '3':
                    return redirect()->intended('/pembelian');
                    break;
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'notfound' => 'Email or password is wrong'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function index()
    {
        try {
            $data['user'] = User::orderBy('created_at', 'DESC')->get();
            $data['akses'] = Akses::orderBy('created_at', 'DESC')->get();

            return view('user.index', [
                'page' => 'User',
                'call' => 'user',
                'akses' => Akses::all()
            ])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();
            User::create($request->all());

            DB::commit();

            return redirect('user')->with('success', 'Data User berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StoreUserRequest $request, User $user)
    {
        try {
            DB::beginTransaction();
            $user->update($request->all());
            DB::commit();
            return redirect('user')->with('success', 'Data User berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }

    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();
            $user->delete();
            DB::commit();
            return redirect('user')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "terjadi kesalahan" . $error->getMessage();
        }
    }
}
