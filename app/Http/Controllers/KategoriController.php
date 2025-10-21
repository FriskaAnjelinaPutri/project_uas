<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategoris = Kategori::with('user')->get();
        return view('kategori.index', compact('kategoris'));
    }

    // Tampilkan form tambah kategori (admin & pemilik boleh)
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('kategori.index')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('kategori.create');
    }

    // Simpan kategori baru (admin & pemilik boleh)
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('kategori.index')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Tampilkan form edit kategori (hanya admin)
    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kategori.index')->with('error', 'Hanya admin yang dapat mengedit kategori.');
        }

        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // Simpan perubahan kategori (hanya admin)
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kategori.index')->with('error', 'Hanya admin yang dapat mengubah kategori.');
        }

        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Tampilkan detail kategori (opsional)
    public function show($id)
    {
        $kategori = Kategori::with('user')->findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    // Hapus kategori (hanya admin)
    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kategori.index')->with('error', 'Hanya admin yang dapat menghapus kategori.');
        }

        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
