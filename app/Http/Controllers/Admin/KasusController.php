<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Jalan;
use App\Model\JenisKasus;
use App\Model\KasusModel;
use App\Model\KondisiKorban;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KasusController extends Controller
{
    public function index()
    {
        $data = array(
            'kasus' => KasusModel::with('kasus_rol', 'kon_rol', 'jalan_rol', 'user_rol')->get(),
            'j_kasus' => JenisKasus::all(),
            'jalan' => Jalan::all(),
            'kondisi' => KondisiKorban::all(),
        );
        return view('admin.kasus')->with('data', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'kasus_id' => 'required',
            'jalan_id' => 'required',
            'jumlah_korban' => 'required',
            'kon_id' => 'required',
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
            'kasus_id' => $request->kasus_id,
            'jalan_id' => $request->jalan_id,
            'jumlah_korban' => $request->jumlah_korban,
            'kon_id' => $request->kon_id,
            'user_id' => $user,
            'ket' => $request->ket,
            'created_at' => $date,
            'updated_at' => $date,
        );
        DB::table('kasus')->insert($data);
        return redirect()->back()->with('status', 'Data tersimpan');
    }

    public function edit($id)
    {
        $respon = KasusModel::where('id', $id)
            ->with('kasus_rol')->first();
        return response()->json($respon);
    }

    public function update(Request $request)
    {
        $rules = [
            'kasus_id' => 'required',
            'jalan_id' => 'required',
            'jumlah_korban' => 'required',
            'kon_id' => 'required',
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
            'kasus_id' => $request->kasus_id,
            'jalan_id' => $request->jalan_id,
            'jumlah_korban' => $request->jumlah_korban,
            'kon_id' => $request->kon_id,
            'user_id' => $user,
            'ket' => $request->ket,
            'updated_at' => $date,
        );
        KasusModel::where('id', $id)->update($data);
        return redirect()->back()->with('status', 'Data berhasil di perbaharui');
    }

    public function destroy(Request $request)
    {
        KasusModel::where('id', $request->id)->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
