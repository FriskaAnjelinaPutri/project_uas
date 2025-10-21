@extends('layouts.template')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="text-center mb-4">
                <h1 class="fw-bold" style="background: linear-gradient(45deg, #3498db, #2980b9); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-size: 3rem;">
                    Selamat Datang di KulinerApp!
                </h1>
                <p class="lead text-muted">Nikmati pilihan tempat makan dan nongkrong terbaik!</p>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-5">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body text-white text-center">
                    <i class="fas fa-store fa-3x mb-3"></i>
                    <h3 class="fw-bold">{{ $tempatMakanCount }}</h3>
                    <p class="mb-0">Tempat Makan</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                <div class="card-body text-white text-center">
                    <i class="fas fa-tags fa-3x mb-3"></i>
                    <h3 class="fw-bold">{{ $kategoriCount }}</h3>
                    <p class="mb-0">Kategori</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <div class="card-body text-white text-center">
                    <i class="fas fa-star fa-3x mb-3"></i>
                    <h3 class="fw-bold">{{ $ulasanCount }}</h3>
                    <p class="mb-0">Ulasan</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card h-100" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <div class="card-body text-white text-center">
                    <i class="fas fa-gift fa-3x mb-3"></i>
                    <h3 class="fw-bold">{{ $promoCount }}</h3>
                    <p class="mb-0">Promosi</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tempat Makan Terbaru -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Tempat Makan Terbaru</h3>
                @auth
                    <a href="{{ route('tempat-makan.index') }}" class="btn btn-primary">
                        <i class="fas fa-eye me-2"></i>Lihat Semua
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        <i class="fas fa-sign-in-alt me-2"></i>Login untuk Mengelola
                    </a>
                @endauth
            </div>
            <div class="row">
                @forelse($tempatMakans as $tempat)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            @if($tempat->gambar)
                                <img src="{{ asset('images/' . $tempat->gambar) }}" class="card-img-top" alt="{{ $tempat->nama_tempat }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/cafe1.jpg') }}" class="card-img-top" alt="{{ $tempat->nama_tempat }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $tempat->nama_tempat }}</h5>
                                <p class="text-muted">
                                    <i class="fas fa-tags me-1"></i>{{ $tempat->kategori?->nama_kategori ?? 'Umum' }}
                                </p>
                                <p class="card-text">{{ Str::limit($tempat->deskripsi, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>{{ $tempat->jam_buka }} - {{ $tempat->jam_tutup }}
                                    </small>
                                    @auth
                                        <a href="{{ route('tempat-makan.show', $tempat->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login untuk Detail</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-store fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada tempat makan.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Kategori Populer -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Kategori Populer</h3>
                @auth
                    <a href="{{ route('kategori.index') }}" class="btn btn-primary">
                        <i class="fas fa-eye me-2"></i>Lihat Semua
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        <i class="fas fa-sign-in-alt me-2"></i>Login untuk Mengelola
                    </a>
                @endauth
            </div>
            <div class="row">
                @forelse($kategoris as $kategori)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <i class="fas fa-tags fa-2x text-primary mb-3"></i>
                                <h6 class="card-title">{{ $kategori->nama_kategori }}</h6>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada kategori.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Promo Terbaru -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Promo Terbaru</h3>
                @auth
                    <a href="{{ route('promo.index') }}" class="btn btn-primary">
                        <i class="fas fa-eye me-2"></i>Lihat Semua
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        <i class="fas fa-sign-in-alt me-2"></i>Login untuk Mengelola
                    </a>
                @endauth
            </div>
            <div class="row">
                @forelse($promos as $promo)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $promo->judul_promo }}</h5>
                                <p class="text-muted">
                                    <i class="fas fa-store me-1"></i>{{ $promo->tempatMakan?->nama_tempat ?? '-' }}
                                </p>
                                <p class="card-text">{{ Str::limit($promo->deskripsi_promo, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="far fa-calendar me-1"></i>
                                        {{ \Carbon\Carbon::parse($promo->mulai_promo)->format('d M Y') }} - 
                                        {{ \Carbon\Carbon::parse($promo->akhir_promo)->format('d M Y') }}
                                    </small>
                                    @auth
                                        <a href="{{ route('promo.index') }}" class="btn btn-sm btn-primary">Lihat</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login untuk Lihat</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-gift fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada promo.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Ulasan Terbaru -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Ulasan Terbaru</h3>
                @auth
                    <a href="{{ route('ulasan.index') }}" class="btn btn-primary">
                        <i class="fas fa-eye me-2"></i>Lihat Semua
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        <i class="fas fa-sign-in-alt me-2"></i>Login untuk Mengelola
                    </a>
                @endauth
            </div>
            <div class="row">
                @forelse($ulasans as $ulasan)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($ulasan->nama_pengulas) }}&background=764ba2&color=fff" 
                                         class="rounded-circle me-3" width="40" height="40" alt="{{ $ulasan->nama_pengulas }}">
                                    <div>
                                        <h6 class="mb-0">{{ $ulasan->nama_pengulas }}</h6>
                                        <small class="text-muted">{{ $ulasan->tempatMakan?->nama_tempat ?? '-' }}</small>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    @for($i=1; $i<=5; $i++)
                                        @if($i <= $ulasan->rating)
                                            <i class="fas fa-star text-warning"></i>
                                        @else
                                            <i class="far fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="card-text">{{ Str::limit($ulasan->komentar, 100) }}</p>
                                <small class="text-muted">
                                    <i class="far fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($ulasan->tanggal_ulasan)->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="fas fa-star fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada ulasan.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection