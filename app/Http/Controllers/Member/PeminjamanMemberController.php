<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PeminjamanMemberController extends Controller
{
    public function index()
    {
        $id = auth()->guard('members')->user()->id;
        $bookings = Booking::where('member_id', $id)->get();

        return view('member.peminjaman.index', compact('bookings'));
    }

    public function return()
    {
        $bookingId = request()->segment(2);
        $retur = Booking::where('id', $bookingId)->first();

        return view('member.peminjaman.retur', compact('retur'));
    }

    public function store_retur(Request $request)
    {
        // Validasi data dari request
        $validatedData = $request->validate([
            'end_date' => 'required|date',
            'member_id' => 'required',
            'booking_id' => 'required',
            'total_date_sewa' => 'required',
        ]);

        // Simpan data booking ke dalam database menggunakan model Booking

        $book = Booking::where('id', $request->booking_id)->first();
        $pengembalian = new Pengembalian();
        $pengembalian->member_id = $validatedData['member_id'];
        $pengembalian->booking_id = $validatedData['booking_id'];
        $pengembalian->end_date = $validatedData['end_date'];
        $pengembalian->total_date_sewa = $validatedData['total_date_sewa'];
        $pengembalian->total_pay = $validatedData['total_date_sewa'] * $book->price_awal;

        $pengembalian->save();

        return redirect()->route('member.peminjaman.index');
    }
}
