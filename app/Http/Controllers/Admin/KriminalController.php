<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\JenisKasus;
use App\Model\KriminalModel;
use App\Model\TkpModel;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KriminalController extends Controller
{
    public function index()
    {
        $data = array(
            'j_kasus' => JenisKasus::all(),
            'tkp' => TkpModel::all(),
            'kriminal' => KriminalModel::with('j_kasus_rol', 'tkp_rol', 'user_rol')->get(),
        );
        return view('admin.kriminal')->with('data', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'kasus' => 'required',
            'kasus_id' => 'required',
            'tkp_id' => 'required',
            'jumlah' => 'required',
            'ket' => 'required',
        ];

        $message = [
            'required' => 'Field harus diisi'
        ];
        $this->validate($request, $rules, $message);
        $ses = Session::get('full_name');
        $user = User::where('nama', $ses)->value('id');
        $date = Carbon::now();
        $data = array(
            'kasus' => $request->kasus,
            'j_kasus_id' => $request->kasus_id,
            'tkp_id' => $request->tkp_id,
            'jumlah' => $request->jumlah,
            'user_id' => $user,
            'ket' => $request->ket,
            'created_at' => $date,
            'updated_at' => $date,
        );
        DB::table('kasus_kriminal')->insert($data);
        return redirect()->back()->with('status', 'Data tersimpan');
    }

    public function edit($id)
    {
        $respon = KriminalModel::where('id', $id)
            ->with('j_kasus_rol', 'tkp_rol', 'user_rol')->first();
        return response()->json($respon);
    }

    public function update(Request $request)
    {
        $rules = [
            'kasus' => 'required',
            'kasus_id' => 'required',
            'tkp_id' => 'required',
            'jumlah' => 'required',
            'ket' => 'required',
        ];

        $message = [
            'required' => 'Field harus diisi'
        ];
        $this->validate($request, $rules, $message);
        $ses = Session::get('full_name');
        $user = User::where('nama', $ses)->value('id');
        $date = Carbon::now();
        $id = $request->id;
        $data = array(
            'kasus' => $request->kasus,
            'j_kasus_id' => $request->kasus_id,
            'tkp_id' => $request->tkp_id,
            'jumlah' => $request->jumlah,
            'user_id' => $user,
            'ket' => $request->ket,
            'updated_at' => $date,
        );
        KriminalModel::where('id', $id)->update($data);
        return redirect()->back()->with('status', 'Data tersimpan');
    }

    public function delete(Request $request)
    {
        KriminalModel::where('id', $request->id)->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
