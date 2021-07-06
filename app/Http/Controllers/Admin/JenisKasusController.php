<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\JenisKasus;

use Illuminate\Http\Request;

class JenisKasusController extends Controller
{
    public function index()
    {
        $data =  JenisKasus::all();
        return view('admin.JenisKasus',['data'=>$data] );
    }
    public function store(Request $request)
    {
        JenisKasus::create($request->all());
        return back()->with('succes','Data Berhasil Di Tambahkan');
    }
}
