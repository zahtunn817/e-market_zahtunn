<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboards.home', [
            'page' => 'Home'
        ]);
    }
    public function profile()
    {
        return view('dashboards.home', [
            'page' => 'Profile'
        ]);
    }
    public function contact()
    {
        return view('dashboards.home', [
            'page' => 'Contact'
        ]);
    }
    public function faq()
    {
        return view('dashboards.home', [
            'page' => 'Faq'
        ]);
    }
}
