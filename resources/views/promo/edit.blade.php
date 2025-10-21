@extends('layouts.template')

@section('title', 'Edit Promosi')

@section('content')
<div class="container">
    <h2>Edit Promosi</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('promo.update', $promo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul_promo" class="form-label">Judul</label>
            <input type="text" name="judul_promo" class="form-control"
                   value="{{ old('judul_promo', $promo->judul_promo) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi_promo" class="form-label">Deskripsi</label>
            <textarea name="deskripsi_promo" class="form-control" rows="3" required>{{ old('deskripsi_promo', $promo->deskripsi_promo) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="mulai_promo" class="form-label">Tanggal Mulai</label>
            <input type="date" name="mulai_promo" class="form-control"
                   value="{{ old('mulai_promo', \Carbon\Carbon::parse($promo->mulai_promo)->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="akhir_promo" class="form-label">Tanggal Selesai</label>
            <input type="date" name="akhir_promo" class="form-control"
                   value="{{ old('akhir_promo', \Carbon\Carbon::parse($promo->akhir_promo)->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="tempat_makan_id" class="form-label">Tempat Makan</label>
            <select name="tempat_makan_id" class="form-select" required>
                <option value="">-- Pilih Tempat Makan --</option>
                @foreach ($tempatMakans as $tempat)
                    <option value="{{ $tempat->id }}"
                        {{ old('tempat_makan_id', $promo->tempat_makan_id) == $tempat->id ? 'selected' : '' }}>
                        {{ $tempat->nama_tempat }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('promo.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
