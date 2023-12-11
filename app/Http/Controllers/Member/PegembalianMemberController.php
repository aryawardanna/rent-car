<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PegembalianMemberController extends Controller
{
    public function index()
    {
        $id = auth()->guard('members')->user()->id;
        $ref = Pengembalian::where('member_id', $id)->get();

        return view('member.pengembalian.index', compact('ref'));
    }

    public function retur()
    {
        $id = request()->segment(2);
        $retur = Pengembalian::where('id', $id)->first();

        return view('member.pengembalian.pay', compact('retur'));
    }

    public function payment(Request $request)
    {
        $validatedData = $request->validate([
            'bayar' => 'required|numeric',
            'no_plat' => 'required|string',
        ]);
        $id = $request->id;
        // Find the Pengembalian model instance
        $pengembalian = Pengembalian::find($id);

        // Update the attributes
        if($pengembalian->total_pay < $validatedData['bayar']) {
            return redirect()->back()->with('error', 'Uang yang dibayarkan melebihi total yang harus dibayarkan');
        } else {
            $pengembalian->bayar =  $validatedData['bayar'];
        }
        $pengembalian->no_plat = $validatedData['no_plat'];

        // Save the changes
        $pengembalian->save();
        $ref = Pengembalian::where('member_id', auth()->guard('members')->user()->id)->get();
        return view('member.pengembalian.index', compact('ref'));
    }
}
