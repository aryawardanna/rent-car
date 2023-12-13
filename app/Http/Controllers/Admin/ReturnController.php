<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $returns = Pengembalian::get();

        return view('admin.pengembalian.index', compact('returns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalian)
    {
        $returns = Pengembalian::where('id', request()->segment(3))->with('members')->first();

        return view('admin.pengembalian.edit', compact('returns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengembalian $pengembalian)
    {
        $pengembalian->total_date_sewa = $request->input('total_date_sewa');
        $pengembalian->no_plat = $request->input('no_plat');
        $pengembalian->total_pay = $request->input('total_pay');
        $pengembalian->bayar = $request->input('bayar');
        $pengembalian->end_date = $request->input('end_date');
        $pengembalian->status = $request->input('status');
        // Lanjutkan dengan atribut-atribut lain yang diizinkan untuk di-update
        // dd($pengembalian->status);
        $pengembalian->save();

        // $pengembalian->update($request->all());
        return redirect()->route('admin.pengembalian.index')->with([
            'message' => 'berhasil di edit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengembalian $pengembalian)
    {
        $pengembalian->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus!',
            'alert-type' => 'danger'
        ]);
    }
}
