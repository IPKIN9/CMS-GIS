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
    
    // update succes notif
    public function update(Request $request, $id)
    {
        $data = [
            'j_kasus' => $request->j_kasus
        ];
        JenisKasus::where(['id'=>$id])->update($data);
        return back()->with('success_edit','Data Berhasil Di Edit');
        
    }
    public function delete(Request $request, $id)
    {
        $data = [
            'j_kasus' => $request->j_kasus
        ];
        JenisKasus::where(['id'=>$id])->delete($data);
        return back()->with('success_delete','Data Berhasil Di Hapus');
        
    }
}
