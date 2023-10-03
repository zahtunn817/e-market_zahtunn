<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function blog()
    {
        return view('blog');
    }

    public function index()
    {
        return view('dashboard');
    }
}
