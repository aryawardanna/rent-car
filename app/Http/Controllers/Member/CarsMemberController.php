<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Type;
use Illuminate\Http\Request;

class CarsMemberController extends Controller
{
    public function index()
    {
        $cars = Car::get();

        return view('member.cars.index', compact('cars'));
    }

    public function booking(Car $car)
    {
        $carId = request()->segment(2);
        $car = Car::where('id', $carId)->first();
        $types = Type::get(['id','nama']);

        return view('member.cars.booking', compact('car'));
    }

    public function store_booking(Request $request)
    {
        // Validasi data dari request
        $validatedData = $request->validate([
            'car_id' => 'required',
            'nama_lengkap' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'nomer_wa' => 'required',
            'alamat_lengkap' => 'required|string',
            'price_awal' => 'required|numeric',
        ]);

        // Simpan data booking ke dalam database menggunakan model Booking
        $booking = new Booking();
        $booking->member_id = $validatedData['member_id'];
        $booking->car_id = $validatedData['car_id'];
        $booking->nama_lengkap = $validatedData['nama_lengkap'];
        $booking->start_date = $validatedData['start_date'];
        $booking->end_date = $validatedData['end_date'];
        $booking->nomer_wa = $validatedData['nomer_wa'];
        $booking->alamat_lengkap = $validatedData['alamat_lengkap'];
        $booking->price_awal = $validatedData['price_awal'];

        // Mengonversi tanggal ke objek DateTime
        $start_date = new \DateTime($validatedData['start_date']);
        $end_date = new \DateTime($validatedData['end_date']);

        // Menghitung selisih antara dua tanggal dalam satuan hari
        $interval = $start_date->diff($end_date);
        $days_difference = $interval->format('%a');

        // Menghitung pay_total
        $booking->total_pay = ($days_difference + 1) * $validatedData['price_awal'];

        // $booking->pay_total = ($validatedData['start_date'] - $validatedData['end_date']) * $validatedData['price_awal'];
        // Atur nilai field lain jika ada

        $booking->save();

        return redirect()->route('member.cars.index');
    }
}
