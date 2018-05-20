<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
      return view('auth.index');
    }

    public function store(Request $request)
    {
    	$nik       = $request->nik;
    	$password  = $request->password;

    	if(Auth::guard('karyawan')->attempt(['nik' => $nik, 'password' => $password])){
  		    return redirect()->intended(route('karyawan.karyawan'));
    	}

      return redirect()->back()->withErrors(['notification' => 'Nomor Induk Karyawan atau Password salah!']);
    }

    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect(route('karyawan.karyawan'));
    }
}
