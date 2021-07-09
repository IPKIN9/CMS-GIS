<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Jalan;
use Illuminate\Http\Request;

class JalanController extends Controller
{
    public function index()
    {
        $data = Jalan::all();
        return view('admin.jalan', ['data' => $data]);
    }
    public function store(Request $request)
    {
        Jalan::create($request->all());
        return back()->with('succes','Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama_jalan' => $request->nama_jalan,
            'coordinat'  => $request->coordinat,
        ];
        Jalan::where(['id'=>$id])->update($data);
        return back()->with('succes','Data Berhasil Di Edit');
    }
    
    public function destroy($id)
    {
        $data =  Jalan::find($id);
        $data->delete();
        return back()->with('succes','Data Berhasil Di Hapus');
    }
}
