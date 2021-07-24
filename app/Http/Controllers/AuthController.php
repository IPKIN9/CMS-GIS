<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->put('full_name', Auth::user()->nama);
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Username atau password salah');
        }
    }

    public function register()
    {
        return view('auth.register');
    }
    public function register_p(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:5|max:12'
        ];

        $messages = [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'username.required' => 'Username Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong!!!',
            'username.unique' => 'Username Sudah Dimiliki',
            'password.min' => 'Password Terkalu Pendek',
            'password.max' => 'Password Terlalu Panjang'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $user = new User;
        $user->nama = ($request->nama);
        $user->username = ($request->username);
        $user->password = Hash::make($request->password);
        $simpan = $user->save();

        if ($simpan) {
            Session::flash('success', 'Register berhasil! silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('er', 'Register Gagal!!, silahlan ulangi lagi');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
