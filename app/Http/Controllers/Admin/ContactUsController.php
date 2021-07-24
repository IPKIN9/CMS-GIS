<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ContactUs;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $data = ContactUs::all();
        return view('admin.ContactUs')->with('data', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            "alamat" => "required"
        ];
        $message = [
            'required' => 'Field harus diisi'
        ];
        $this->validate($request, $rules, $message);
        $date = Carbon::now();
        $data = array(
            'alamat'     => $request->alamat,
            'telepon'    => $request->telepon,
            'email'      => $request->email,
            'created_at' => $date,
            'updated_at' => $date,
        );
        DB::table('contact_us')->insert($data);
        return redirect()->back()->with('status', 'Data tersimpan');
    }

    public function edit($id)
    {
        $respon = ContactUs::where('id', $id)
            ->first();
        return response()->json($respon);
    }

    public function update(Request $request)
    {
        $rules = [
            "alamat" => "required"
        ];
        $message = [
            'required' => 'Field harus diisi'
        ];
        $this->validate($request, $rules, $message);
        $date = Carbon::now();
        $id = $request->id;
        $data = array(
            'alamat'     => $request->alamat,
            'telepon'    => $request->telepon,
            'email'      => $request->email,
            'updated_at' => $date,
        );
        ContactUs::where('id', $id)->update($data);
        return redirect()->back()->with('status', 'Data berhasil di perbaharui');
    }

    public function destroy(Request $request)
    {
        ContactUs::where('id', $request->id)->delete();
        return redirect()->back()->with('status', 'Data berhasil dihapus');
    }
}
