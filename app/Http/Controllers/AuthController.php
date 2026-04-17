<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // FORM LOGIN
    public function loginForm()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        // VALIDASI
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = DB::table('users')
            ->where('email', $request->email)
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {

            session([
                'login' => true,
                'name' => $user->name
            ]);

            return redirect('/');
        } else {
            return back()->with('error', 'Email atau password salah');
        }
    }

    // LOGOUT
    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}