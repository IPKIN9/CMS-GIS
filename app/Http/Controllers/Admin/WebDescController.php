<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\WebDesc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebDescController extends Controller
{
   public function index()
   {
      $data = WebDesc::all();
       return view('admin.WebDesc')->with('data',$data);
   } 
   public function store(Request $request)
   {
       $Rules = [
           'web_description'=> 'required'
       ];

       $message = [
           'required' => 'Field harus diisi'
       ];
       $this ->validate($request, $Rules, $message);

       $date = Carbon::now();
       $data = array(
           'web_description'=> $request->web_description,
           'created_at' => $date,
           'updated_at' => $date,
       );
       DB::table('_web_description')->insert($data);
       return redirect()->back()->with('status','Data tersimpan');
   }
}
