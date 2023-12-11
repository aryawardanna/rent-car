<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardMemberController extends Controller
{
    public function index()
    {
        // Lakukan logika untuk menampilkan dashboard di sini
        return view('member.dashboard.index');
    }
}
