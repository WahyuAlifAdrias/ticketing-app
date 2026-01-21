<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    // 1. tampilkan semua payment type
    public function index()
    {
        $paymentTypes = PaymentType::all();
        return view('admin.payment-types.index', compact('paymentTypes'));
    }

    // 2. form tambah baru
    public function create()
    {
        return view('admin.payment-types.create');
    }

    // 3. simpan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        PaymentType::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.payment-types.index')->with('success', 'Tipe pembayaran berhasil ditambahkan');
    }

    // 4. form edit
    public function edit(PaymentType $paymentType)
    {
        return view('admin.payment-types.edit', compact('paymentType'));
    }

    // 5. update data
    public function update(Request $request, PaymentType $paymentType)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $paymentType->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.payment-types.index')->with('success', 'Tipe pembayaran berhasil diperbarui');
    }

    // 6. hapus
    public function destroy(PaymentType $paymentType)
    {
        $paymentType->delete();
        return redirect()->route('admin.payment-types.index')->with('success', 'Tipe pembayaran berhasil dihapus');
    }
}
