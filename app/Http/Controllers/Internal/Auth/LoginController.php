<?php

namespace App\Http\Controllers\Internal\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
    	return view('internal.auth.login');
    }

    public function store(Request $request)
    {
      $email = $request->email;
      $password = $request->password;

    	if(Auth::guard('pengguna')->attempt(['email' => $email, 'password' => $password])){
    		return redirect()->intended(route('upload'));
    	}

    	return redirect()->back()->withErrors(['notification' => 'E-mail atau Password salah!']);
    }

    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect(route('upload'));
    }
}
