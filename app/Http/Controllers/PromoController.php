<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\TempatMakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoController extends Controller
{
    // Tampilkan semua promo
    public function index()
    {
        $promos = Promo::with('tempatMakan')->latest()->get();
        return view('promo.index', compact('promos'));
    }

    // Form tambah promo
    public function create()
    {
        $tempatMakans = TempatMakan::where('user_id', Auth::id())->get();
        return view('promo.create', compact('tempatMakans'));
    }

    // Simpan promo baru
    public function store(Request $request)
    {
        $request->validate([
            'judul_promo'     => 'required|string|max:255',
            'deskripsi_promo' => 'required|string',
            'mulai_promo'     => 'required|date',
            'akhir_promo'     => 'required|date|after_or_equal:mulai_promo',
            'tempat_makan_id' => 'required|exists:friska_tempat_makans,id',
        ]);

        // Cek apakah tempat makan milik user
        $tempat = TempatMakan::findOrFail($request->tempat_makan_id);
        if ($tempat->user_id !== Auth::id()) {
            return back()->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        Promo::create([
            'judul_promo'     => $request->judul_promo,
            'deskripsi_promo' => $request->deskripsi_promo,
            'mulai_promo'     => $request->mulai_promo,
            'akhir_promo'     => $request->akhir_promo,
            'tempat_makan_id' => $request->tempat_makan_id,
            'user_id'         => Auth::id(),
        ]);

        return redirect()->route('promo.index')->with('success', 'Promo berhasil ditambahkan.');
    }

    // Form edit promo
    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        $tempatMakans = TempatMakan::where('user_id', Auth::id())->get();

        if ($promo->tempatMakan->user_id !== Auth::id()) {
            return back()->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        return view('promo.edit', compact('promo', 'tempatMakans'));
    }

    // Update promo
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_promo'     => 'required|string|max:255',
            'deskripsi_promo' => 'required|string',
            'mulai_promo'     => 'required|date',
            'akhir_promo'     => 'required|date|after_or_equal:mulai_promo',
            'tempat_makan_id' => 'required|exists:friska_tempat_makans,id',
        ]);

        $promo = Promo::findOrFail($id);

        if ($promo->tempatMakan->user_id !== Auth::id()) {
            return back()->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        $promo->update([
            'judul_promo'     => $request->judul_promo,
            'deskripsi_promo' => $request->deskripsi_promo,
            'mulai_promo'     => $request->mulai_promo,
            'akhir_promo'     => $request->akhir_promo,
            'tempat_makan_id' => $request->tempat_makan_id,
        ]);

        return redirect()->route('promo.index')->with('success', 'Promo berhasil diperbarui.');
    }

    // Hapus promo
    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);

        if ($promo->tempatMakan->user_id !== Auth::id()) {
            return back()->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        $promo->delete();

        return redirect()->route('promo.index')->with('success', 'Promo berhasil dihapus.');
    }
}
