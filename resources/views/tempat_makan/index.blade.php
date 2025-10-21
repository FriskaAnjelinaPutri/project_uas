@extends('layouts.template')

@section('title', 'Data Tempat Makan')

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="fw-bold" style="background: linear-gradient(45deg, #3498db, #2980b9); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                        <i class="fas fa-store me-3"></i>Daftar Tempat Makan
                    </h1>
                    <p class="text-muted">Kelola dan jelajahi semua tempat makan yang tersedia</p>
                </div>
                @auth
                    <a href="{{ route('tempat-makan.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus me-2"></i>Tambah Tempat Makan
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Table View -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-table me-2"></i>Tabel Data Tempat Makan
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="placesTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tempat</th>
                                    <th>Kategori</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tempatMakans as $index => $tm)
                                    <tr class="place-row" data-name="{{ strtolower($tm->nama_tempat) }}" data-category="{{ strtolower($tm->kategori->nama_kategori ?? '') }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $tm->nama_tempat }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $tm->kategori->nama_kategori ?? '-' }}</span>
                                        </td>
                                        <td>{{ $tm->alamat }}</td>
                                        <td>
                                            <span class="badge bg-success">Aktif</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('tempat-makan.show', $tm->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @auth
                                                <a href="{{ route('tempat-makan.edit', $tm->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('tempat-makan.destroy', $tm->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus tempat makan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endauth
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-5">
                                            <i class="fas fa-store fa-3x mb-3"></i><br>
                                            Belum ada data tempat makan
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Filter table rows by search and category
function filterTable() {
    const search = document.getElementById('searchInput').value.toLowerCase();
    const category = document.getElementById('categoryFilter').value.toLowerCase();
    const rows = document.querySelectorAll('.place-row');
    rows.forEach(row => {
        const name = row.getAttribute('data-name');
        const cat = row.getAttribute('data-category');
        if ((name.includes(search) || !search) && (cat === category || !category)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

document.getElementById('searchInput').addEventListener('input', filterTable);
document.getElementById('categoryFilter').addEventListener('change', filterTable);

function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('categoryFilter').value = '';
    filterTable();
}
</script>
@endsection
