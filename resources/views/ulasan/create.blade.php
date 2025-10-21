@extends('layouts.template')

@section('title', 'Tambah Ulasan')

@section('content')
<div class="container">
    <h2>Tambah Ulasan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ulasan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="tempat_makan_id" class="form-label">Tempat Makan</label>
            <select name="tempat_makan_id" class="form-select" required>
                <option value="">-- Pilih Tempat Makan --</option>
                @foreach($tempatMakans as $tm)
                    <option value="{{ $tm->id }}">{{ $tm->nama_tempat }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama_pengulas" class="form-label">Nama Pengulas</label>
            <input type="text" name="nama_pengulas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-5)</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar</label>
            <textarea name="komentar" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_ulasan" class="form-label">Tanggal Ulasan</label>
            <input type="date" name="tanggal_ulasan" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('ulasan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
