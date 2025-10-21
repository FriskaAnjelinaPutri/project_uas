@extends('layouts.template')

@section('title', 'Detail Kategori')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Kategori</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama Kategori:</strong> {{ $kategori->nama_kategori }}</p>
            <p><strong>Dibuat oleh:</strong> {{ $kategori->user->name ?? 'Tidak diketahui' }}</p>

            <a href="{{ route('kategori.index') }}" class="btn btn-secondary mt-3">⬅ Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection
