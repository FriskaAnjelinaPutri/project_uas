@extends('layouts.template')

@section('title', 'Edit Ulasan')

@section('content')
<div class="container">
    <h2>Edit Ulasan</h2>

    <form action="{{ route('ulasan.update', $ulasan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tempat_makan_id" class="form-label">Tempat Makan</label>
            <select name="tempat_makan_id" class="form-select" required>
                @foreach ($tempatMakans as $tm)
                    <option value="{{ $tm->id }}" {{ $tm->id == $ulasan->tempat_makan_id ? 'selected' : '' }}>
                        {{ $tm->nama_tempat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nama_pengulas" class="form-label">Nama Pengulas</label>
            <input type="text" name="nama_pengulas" class="form-control" value="{{ $ulasan->nama_pengulas }}" required>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control" value="{{ $ulasan->rating }}" min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar</label>
            <textarea name="komentar" class="form-control" rows="3" required>{{ $ulasan->komentar }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_ulasan" class="form-label">Tanggal Ulasan</label>
            <input type="date" name="tanggal_ulasan" class="form-control" value="{{ $ulasan->tanggal_ulasan }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('ulasan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
