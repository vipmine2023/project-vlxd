<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index');
        }

        return view('admin.login');
    }

    function checkLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['type'] = 'admin';
        if (Auth::attempt($credentials)) 
        {
            if (Auth::user()->type == 'admin') {
                return redirect()->route('admin.index');
            }
        }

        return back()->with('error', 'Đăng nhập thất bại!');
    }

    function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
