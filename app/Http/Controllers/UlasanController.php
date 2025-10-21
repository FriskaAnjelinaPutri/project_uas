<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\TempatMakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    // Tampilkan semua ulasan
    public function index()
    {
        $ulasans = Ulasan::with('tempatMakan')->latest()->get();
        return view('ulasan.index', compact('ulasans'));
    }

    // Form tambah ulasan (tanpa login)
    public function create()
    {
        $tempatMakans = TempatMakan::all();
        return view('ulasan.create', compact('tempatMakans'));
    }

    // Simpan ulasan baru
    public function store(Request $request)
    {
        $request->validate([
            'tempat_makan_id' => 'required|exists:friska_tempat_makans,id',
            'nama_pengulas'   => 'required|string|max:255',
            'rating'          => 'required|integer|min:1|max:5',
            'komentar'        => 'required|string',
        ]);

        Ulasan::create([
            'tempat_makan_id' => $request->tempat_makan_id,
            'nama_pengulas'   => $request->nama_pengulas,
            'rating'          => $request->rating,
            'komentar'        => $request->komentar,
            'tanggal_ulasan'  => now(),
        ]);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil ditambahkan.');
    }

    // Form edit ulasan
    public function edit($id)
    {
        $ulasan = Ulasan::findOrFail($id);

        if (Auth::user()?->role !== 'admin') {
            return redirect()->route('ulasan.index')->with('error', 'Hanya admin yang dapat mengedit ulasan.');
        }

        $tempatMakans = TempatMakan::all();
        return view('ulasan.edit', compact('ulasan', 'tempatMakans'));
    }

    // Update ulasan
    public function update(Request $request, $id)
    {
        $request->validate([
            'tempat_makan_id' => 'required|exists:friska_tempat_makans,id',
            'nama_pengulas'   => 'required|string|max:255',
            'rating'          => 'required|integer|min:1|max:5',
            'komentar'        => 'required|string',
        ]);

        $ulasan = Ulasan::findOrFail($id);

        if (Auth::user()?->role !== 'admin') {
            return redirect()->route('ulasan.index')->with('error', 'Hanya admin yang dapat memperbarui ulasan.');
        }

        $ulasan->update([
            'tempat_makan_id' => $request->tempat_makan_id,
            'nama_pengulas'   => $request->nama_pengulas,
            'rating'          => $request->rating,
            'komentar'        => $request->komentar,
            'tanggal_ulasan'  => now(),
        ]);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil diperbarui.');
    }

    // Hapus ulasan
    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);

        if (Auth::user()?->role !== 'admin') {
            return redirect()->route('ulasan.index')->with('error', 'Hanya admin yang dapat menghapus ulasan.');
        }

        $ulasan->delete();

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dihapus.');
    }
}
