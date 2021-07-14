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
}
