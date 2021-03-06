<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\TkpModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TkpController extends Controller
{
    public function index()
    {
        $data = TkpModel::all();
        return view('admin.Tkp')->with('data',$data);
    }

    public function store(Request $request)
    {
        $rules = [
            "kelurahan" => "required"
        ];
        $message = [
            'required' => 'Field harus diisi'
        ];
        $this->validate($request, $rules, $message);
        $date = Carbon::now();
        $data = array(
            'kelurahan' => $request->kelurahan,
            'koordinat' => $request->koordinat,
            'created_at' => $date,
            'updated_at' => $date,
        );
        DB::table('Tkp')->insert($data);
        return redirect()->back()->with('status', 'Data tersimpan');
    }

    public function edit($id)
    {
        $respon = TkpModel::where('id',$id)
            ->first();
        return response()->json($respon);
    }

    public function update(Request $request)
    {
        $rules = [
            "kelurahan" => "required"
        ];
        $message = [
            'required' => 'Field harus diisi'
        ];
        $this->validate($request, $rules, $message);
        $date = Carbon::now();
        $id = $request->id;
        $data = array(
            'kelurahan' => $request->kelurahan,
            'koordinat' => $request->koordinat,
            'updated_at' => $date,
        );
        TkpModel::where('id',$id)->update($data);
        return redirect()->back()->with('status','Data berhasil di perbaharui');
    }

    public function destroy(Request $request)
    {
        TkpModel::where('id', $request->id)->delete();
        return redirect()->back()->with('status','Data berhasil dihapus');
    }
}
