<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\KondisiKorban;

use Illuminate\Http\Request;

class KondisiKorbanController extends Controller
{
    public function index()
    {
        $data =  KondisiKorban::all();
        return view('admin.KondisiKorban',['data'=>$data] );
    }

    public function store(Request $request)
    {
        KondisiKorban::create($request->all());
        return back()->with('succes','Data Berhasil Di Tambahkan');
    }
}
