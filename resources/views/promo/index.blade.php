@extends('layouts.template')

@section('title', 'Data Promo')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold" style="background: linear-gradient(45deg, #3498db, #2980b9); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                        <i class="fas fa-gift me-3"></i>Data Promo
                    </h1>
                    <p class="text-muted">Kelola dan lihat semua promo tempat makan</p>
                </div>
                @auth
                    <a href="{{ route('promo.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus me-2"></i>Tambah Promo
                    </a>
                @endauth
            </div>
        </div>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pesan error --}}
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

    <table class="table table-bordered table-striped table-hover table-custom">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul Promo</th>
                <th>Tempat Makan</th>
                <th>Periode</th>
                <th>Deskripsi</th>
                @auth
                    <th>Aksi</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($promos as $index => $promo)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $promo->judul_promo }}</td>
                    <td>{{ $promo->tempatMakan->nama_tempat ?? '-' }}</td>
                    <td>{{ $promo->mulai_promo }} s/d {{ $promo->akhir_promo }}</td>
                    <td>{{ $promo->deskripsi_promo }}</td>
                    @auth
                        <td>
                            <a href="{{ route('promo.edit', $promo->id) }}" class="btn btn-warning btn-sm btn-action" title="Edit"><i class="fas fa-edit"></i></a>

                            <form action="{{ route('promo.destroy', $promo->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus promo ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-action" title="Hapus"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="@auth 6 @else 5 @endauth" class="text-center">Belum ada data promo.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
