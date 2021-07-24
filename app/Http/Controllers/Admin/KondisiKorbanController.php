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
        return view('admin.KondisiKorban', ['data' => $data]);
    }

    public function store(Request $request)
    {
        KondisiKorban::create($request->all());
        return back()->with('succes', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'kon_kasus' => $request->kon_kasus,
            'ket'       => $request->ket
        ];
        KondisiKorban::where(['id' => $id])->update($data);
        return back()->with('succes', 'Data Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $data =  KondisiKorban::find($id);
        $data->delete();
        return back()->with('succes', 'Data Berhasil Di Hapus');
    }
}
