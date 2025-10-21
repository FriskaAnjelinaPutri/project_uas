<?php

namespace App\Http\Controllers;

use App\Models\TempatMakan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TempatMakanController extends Controller
{
    // Tampilkan semua tempat makan
    public function index()
    {
        $tempatMakans = TempatMakan::with('kategori', 'user')->get();
        return view('tempat_makan.index', compact('tempatMakans'));
    }

    // Form tambah tempat makan
    public function create()
    {
        $kategoris = Kategori::all();
        return view('tempat_makan.create', compact('kategoris'));
    }

    // Simpan tempat makan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_tempat'  => 'required|string|max:255',
            'deskripsi'    => 'required',
            'alamat'       => 'required',
            'jam_buka'     => 'required',
            'jam_tutup'    => 'required',
            'no_telepon'   => 'required',
            'kategori_id'  => 'required|exists:friska_kategoris,id',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['gambar'] = $filename;
        }

        TempatMakan::create($data);

        return redirect()->route('tempat-makan.index')->with('success', 'Tempat makan berhasil ditambahkan.');
    }

    // Form edit tempat makan
    public function edit($id)
    {
        $tempatMakan = TempatMakan::findOrFail($id);

        if (Auth::user()->role === 'pemilik' && $tempatMakan->user_id !== Auth::id()) {
            return redirect()->route('tempat-makan.index')->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        $kategoris = Kategori::all();
        return view('tempat_makan.edit', compact('tempatMakan', 'kategoris'));
    }

    // Update data tempat makan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tempat'  => 'required|string|max:255',
            'deskripsi'    => 'required',
            'alamat'       => 'required',
            'jam_buka'     => 'required',
            'jam_tutup'    => 'required',
            'no_telepon'   => 'required',
            'kategori_id'  => 'required|exists:friska_kategoris,id',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $tempatMakan = TempatMakan::findOrFail($id);

        if (Auth::user()->role === 'pemilik' && $tempatMakan->user_id !== Auth::id()) {
            return redirect()->route('tempat-makan.index')->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($tempatMakan->gambar && file_exists(public_path('images/' . $tempatMakan->gambar))) {
                unlink(public_path('images/' . $tempatMakan->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['gambar'] = $filename;
        }

        $tempatMakan->update($data);

        return redirect()->route('tempat-makan.index')->with('success', 'Tempat makan berhasil diperbarui.');
    }

    // Detail
    public function show($id)
    {
        $tempatMakan = TempatMakan::with('kategori', 'user')->findOrFail($id);
        return view('tempat_makan.show', compact('tempatMakan'));
    }

    // Hapus tempat makan
    public function destroy($id)
    {
        $tempatMakan = TempatMakan::findOrFail($id);

        if (Auth::user()->role === 'pemilik' && $tempatMakan->user_id !== Auth::id()) {
            return redirect()->route('tempat-makan.index')->with('error', 'Anda bukan pemilik tempat makan ini.');
        }

        if ($tempatMakan->gambar && file_exists(public_path('images/' . $tempatMakan->gambar))) {
            unlink(public_path('images/' . $tempatMakan->gambar));
        }

        $tempatMakan->delete();

        return redirect()->route('tempat-makan.index')->with('success', 'Tempat makan berhasil dihapus.');
    }
}
