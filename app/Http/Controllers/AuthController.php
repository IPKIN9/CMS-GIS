<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator ;
use Hash;
use Session;
use App\Model\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/auth');
    }

    public function login(Request $request)
    {
        $rules = [
            'username'              => 'required|string',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'password.required'     => 'Password wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $credentials = $request->only('username', 'password');
 
        if (Auth::attempt($credentials)) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('register');
 
        } else { // false
            Session::flash('error', 'Username atau password salah');
            return redirect()->route('login');
        }
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
            Session::flash('er','Register Gagal!!, silahlan ulangi lagi');
            return redirect()->route('login');
        }
    }
}