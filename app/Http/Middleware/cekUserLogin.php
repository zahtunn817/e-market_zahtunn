<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cekUserLogin
{

    public function handle(Request $request, Closure $next, $rules)
    {
        $user = Auth::user();

        if (!Auth::check()) {
            return redirect('/');
        }
        if ($user->akses_id == $rules) {
            return $next($request);
        }
        return redirect('/')->with('error', 'You have no accsess');
    }
}
