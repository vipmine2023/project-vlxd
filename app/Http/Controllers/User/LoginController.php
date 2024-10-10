<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login_index() {
        if (Auth::check()) {
            return redirect()->route('user.index');
        }
        return view("user_views.pages.login");
    }

    public function login(LoginUserRequest $request) {
        $credentials = $request->only('email', 'password');
        $credentials['type'] = 'user';
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu sai'
            ])->withInput($request->only('email'));
        }

        return redirect('/');
    }

    public function register_index() {
        if (Auth::check()) {
            return redirect()->route('user.index');
        }
        return view("user_views.pages.register");
    }

    public function register(RegisterUserRequest $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->type = 'user';
        try {
            $user->save();
        } catch (\Exception $e) {
            return redirect()->back()->with("error","Register Fail");
        }
        Auth::login($user);
        return redirect()->route('user.index');
    }

    public function logout() {
        if (!Auth::check()) {
            return redirect()->back();
        }
        Auth::logout();
        return redirect()->route('user.login.index');
    }
}
