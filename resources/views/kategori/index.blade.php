@extends('layouts.template')

@section('title', 'Kategori Tempat Makan')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold" style="background: linear-gradient(45deg, #3498db, #2980b9); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                        <i class="fas fa-tags me-3"></i>Data Kategori
                    </h1>
                    <p class="text-muted">Kelola dan lihat semua kategori tempat makan</p>
                </div>
                @auth
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus me-2"></i>Tambah Kategori
                    </a>
                @endauth
            </div>
        </div>
    </div>

    {{-- Tampilkan pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tampilkan pesan error --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <style>
        .table-custom {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(44,62,80,0.08);
        }
        .table-custom thead th {
            background: #2c3e50;
            color: #fff;
            font-weight: 600;
            border: none;
        }
        .table-custom tbody tr:nth-child(even) {
            background: #f6f8fa;
        }
        .table-custom tbody tr:nth-child(odd) {
            background: #fff;
        }
        .table-custom td, .table-custom th {
            vertical-align: middle;
        }
        .btn-action {
            padding: 2px 8px;
            font-size: 0.95em;
            margin-right: 2px;
        }
    </style>

    <table class="table table-bordered table-hover table-custom">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                @auth
                    @if (Auth::user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $index => $kategori)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <td>
                                <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm btn-action" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-action" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        @endif
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="{{ Auth::check() && Auth::user()->role === 'admin' ? 3 : 2 }}" class="text-center">Data kategori belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
        