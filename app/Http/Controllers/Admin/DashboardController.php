<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Session('loged_in') == 'login') 
        {
            return view('admin.dashboard');
        }
        else
        {
            return redirect()->route('login')->with('login', 'Anda Harus Login Terlebih Dahulu');
        }

    }
}
