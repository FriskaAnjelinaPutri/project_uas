@extends('layouts.template')

@section('title', 'Edit Tempat Makan')

@section('content')
<div class="container">
    <h2>Edit Tempat Makan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tempat-makan.update', $tempatMakan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_tempat" class="form-label">Nama Tempat</label>
            <input type="text" name="nama_tempat" class="form-control" value="{{ $tempatMakan->nama_tempat }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required>{{ $tempatMakan->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2" required>{{ $tempatMakan->alamat }}</textarea>
        </div>

        <div class="mb-3">
            <label for="jam_buka" class="form-label">Jam Buka</label>
            <input type="time" name="jam_buka" class="form-control" value="{{ $tempatMakan->jam_buka }}" required>
        </div>

        <div class="mb-3">
            <label for="jam_tutup" class="form-label">Jam Tutup</label>
            <input type="time" name="jam_tutup" class="form-control" value="{{ $tempatMakan->jam_tutup }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="{{ $tempatMakan->no_telepon }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori->id == $tempatMakan->kategori_id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Sekarang</label><br>
            @if($tempatMakan->foto)
                <img src="{{ asset('storage/tempat_makan/' . $tempatMakan->foto) }}" width="150" alt="Foto Tempat Makan">
            @else
                <p class="text-muted">Belum ada foto</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Ganti Foto (opsional)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('tempat-makan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
