@extends('layouts.template')

@section('title', 'Data Ulasan')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold" style="background: linear-gradient(45deg, #3498db, #2980b9); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                        <i class="fas fa-star me-3"></i>Data Ulasan
                    </h1>
                    <p class="text-muted">Kelola dan lihat semua ulasan tempat makan</p>
                </div>
                <a href="{{ route('ulasan.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus me-2"></i>Tambah Ulasan
                </a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
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
                <th>Tempat Makan</th>
                <th>Nama Pengulas</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Tanggal Ulasan</th>
                @auth
                    @if (Auth::user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($ulasans as $index => $ulasan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $ulasan->tempatMakan->nama_tempat ?? '-' }}</td>
                    <td>{{ $ulasan->nama_pengulas }}</td>
                    <td>{{ $ulasan->rating }}</td>
                    <td>{{ $ulasan->komentar }}</td>
                    <td>{{ \Carbon\Carbon::parse($ulasan->tanggal_ulasan)->translatedFormat('d F Y') }}</td>
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <td>
                                <a href="{{ route('ulasan.edit', $ulasan->id) }}" class="btn btn-warning btn-sm btn-action" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
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
                    <td colspan="@auth {{ Auth::user()->role === 'admin' ? 7 : 6 }} @else 6 @endauth" class="text-center">Belum ada data ulasan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
