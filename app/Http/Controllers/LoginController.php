<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view ('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password'=> 'required'
        ]);

        if (auth()->attempt(request(['email' ,'password']))){
            return redirect()->route('home.index');
        }

        return redirect()->back()->with('error' ,'Email atau password salah');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
