<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('landing.login');
    }

    public function signin(Request $request){
        $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required|string|max:255',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role != "Kustomer"){
                Auth::logout();
                return redirect('login')->with('error','Email atau password salah!');
            }
            return redirect()->intended('/');
        }

        return redirect('login')->with('error','Email atau password salah!');
    }

    public function register(){
        return view('landing.register');
    }

    public function signup(Request $request){
        $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nomor_handphone' => 'required|string|min:10',
        ]);

        $password =  Hash::make($request->password);
        $data = $request->all();
        $data['password'] = $password;

        $user = User::create($data);
        
        return redirect('login')->with('success','Berhasil register!');
    }

    // Admin====================

    public function loginAdmin(){
        return view('admin.login');
    }

    public function signinAdmin(Request $request){
        $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required|string|max:255',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->role != "Admin"){
                Auth::logout();
                return redirect('loginAdmin')->with('error','Email atau password salah!');
            }
            return redirect()->intended('destinasi');
        }

        return redirect('loginAdmin')->with('error','Email atau password salah!');
    }

    public function registerAdmin(){
        return view('admin.register');
    }

    public function signupAdmin(Request $request){
        $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'nomor_handphone' => 'required|string|min:10',
        ]);

        $password =  Hash::make($request->password);
        $data = $request->all();
        $data['password'] = $password;

        $user = User::create($data);
        
        return redirect('loginAdmin')->with('success','Berhasil register!');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
