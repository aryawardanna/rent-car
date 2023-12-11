<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterMemberController extends Controller
{
    public function showRegisterForm()
    {
        return view('member.register'); // Ganti dengan view login Anda
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:members,email',
            'password' => 'required|string|min:3',
            'phone' => 'required|numeric|min:8',
            'sim' => 'numeric|required',
            'address' => 'string|max:255',
        ]);

        $member = Member::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'sim' => $validatedData['sim'],
            'address' => $validatedData['address'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Sesuaikan dengan rute setelah registrasi berhasil
        return redirect('/loginmember')->with('success', 'Registration successful!');
    }
}
