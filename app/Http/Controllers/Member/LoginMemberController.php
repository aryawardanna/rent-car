<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMemberController extends Controller
{
     // Menampilkan form login
    public function showLoginForm()
    {
        return view('member.login'); // Ganti dengan view login Anda
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('members')->attempt($credentials)) {
            // Jika berhasil login
            return view('member.dashboard.index');
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login-member'); // Ganti dengan rute login
    }

}
