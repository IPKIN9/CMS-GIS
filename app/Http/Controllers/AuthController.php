<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator ;
use Hash;
use Session;
use App\Model\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function register_p(Request $request)
    {
        $rules =[
            'nama'=> 'required',
            'username' => 'required',
            'password' => 'required'
        ];

        $messages =[
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'username.required' => 'Username Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong!!!' 
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
            
        }
        $user = new User;
        $user->nama = ($request->nama);
        $user->username = ($request->username); 
        $user->password = Hash::make($request->password);
        $simpan = $user->save();
        
        if ($simpan){
            Session::flash('success','Register berhasil! silahkan login untuk mengakses data');
            return redirect()->route('login');
        }
        else{
            Session::flash('errors','Register Gagal!!, silahlan ulangi lagi');
            return redirect()->route('login');
        }
    }
}