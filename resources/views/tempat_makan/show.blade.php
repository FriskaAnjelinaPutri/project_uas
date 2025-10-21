@extends('layouts.template')

@section('title', 'Detail Tempat Makan')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Tempat Makan</h2>
    <div class="card mb-3">
        <div class="row g-0">
            @if($tempatMakan->gambar)
                <div class="col-md-4">
                    <img src="{{ asset('images/' . $tempatMakan->gambar) }}" class="img-fluid rounded-start" alt="{{ $tempatMakan->nama_tempat }}">
                </div>
            @endif

            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $tempatMakan->nama_tempat }}</h5>
                    <p class="card-text"><strong>Deskripsi:</strong><br>{{ $tempatMakan->deskripsi }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $tempatMakan->alamat }}</p>
                    <p class="card-text"><strong>Jam Operasional:</strong> {{ $tempatMakan->jam_buka }} - {{ $tempatMakan->jam_tutup }}</p>
                    <p class="card-text"><strong>No Telepon:</strong> {{ $tempatMakan->no_telepon }}</p>
                    <p class="card-text"><strong>Kategori:</strong> {{ $tempatMakan->kategori->nama_kategori ?? '-' }}</p>
                    <p class="card-text"><strong>Ditambahkan oleh:</strong> {{ $tempatMakan->user->name ?? '-' }}</p>

                    <a href="{{ route('tempat-makan.index') }}" class="btn btn-success">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
