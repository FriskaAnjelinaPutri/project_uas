@extends('layouts.template')

@section('title', 'Tambah Promosi')

@section('content')
<div class="container">
    <h2>Tambah Promosi</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('promo.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="judul_promo" class="form-label">Judul</label>
            <input type="text" name="judul_promo" class="form-control" required value="{{ old('judul_promo') }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi_promo" class="form-label">Deskripsi</label>
            <textarea name="deskripsi_promo" class="form-control" rows="3" required>{{ old('deskripsi_promo') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="mulai_promo" class="form-label">Tanggal Mulai</label>
            <input type="date" name="mulai_promo" class="form-control" required value="{{ old('mulai_promo') }}">
        </div>

        <div class="mb-3">
            <label for="akhir_promo" class="form-label">Tanggal Selesai</label>
            <input type="date" name="akhir_promo" class="form-control" required value="{{ old('akhir_promo') }}">
        </div>

        <div class="mb-3">
            <label for="tempat_makan_id" class="form-label">Tempat Makan</label>
            <select name="tempat_makan_id" class="form-select" required>
                <option value="">-- Pilih Tempat Makan --</option>
                @foreach ($tempatMakans as $tempat)
                    <option value="{{ $tempat->id }}" {{ old('tempat_makan_id') == $tempat->id ? 'selected' : '' }}>
                        {{ $tempat->nama_tempat }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('promo.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
