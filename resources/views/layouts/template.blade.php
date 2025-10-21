<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      overflow-x: hidden;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
    }

    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 280px;
      overflow-y: auto;
      background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
      z-index: 1000;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar:hover {
    }

    .main-content {
      margin-left: 280px;
      padding: 2rem;
      width: calc(100% - 280px);
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      min-height: 100vh;
      border-radius: 20px 0 0 20px;
    }

    .nav-link {
      border-radius: 12px;
      margin: 5px 0;
      position: relative;
      overflow: hidden;
    }

    .nav-link:hover {
      background: linear-gradient(45deg, #3498db, #2980b9) !important;
    }

    .nav-link.active {
      background: linear-gradient(45deg, #e74c3c, #c0392b) !important;
    }

    .nav-link::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    }

    .nav-link:hover::before {
    }

    .brand-logo {
      background: linear-gradient(45deg, #f39c12, #e67e22);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 700;
      font-size: 1.5rem;
    }

    .user-profile {
      background: rgba(255,255,255,0.1);
      border-radius: 15px;
      padding: 15px;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.2);
    }

    .dropdown-menu {
      border-radius: 15px;
      border: none;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      backdrop-filter: blur(10px);
    }

    .dropdown-item {
      border-radius: 8px;
      margin: 2px 5px;
    }

    .dropdown-item:hover {
      background: linear-gradient(45deg, #3498db, #2980b9);
    }

    .btn {
      border-radius: 12px;
      font-weight: 500;
      border: none;
      position: relative;
      overflow: hidden;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    }

    .btn:hover::before {
    }

    .btn-primary {
      background: linear-gradient(45deg, #3498db, #2980b9);
    }

    .btn-primary:hover {
    }

    .btn-success {
      background: linear-gradient(45deg, #27ae60, #2ecc71);
    }

    .btn-warning {
      background: linear-gradient(45deg, #f39c12, #e67e22);
    }

    .btn-danger {
      background: linear-gradient(45deg, #e74c3c, #c0392b);
    }

    .btn-info {
      background: linear-gradient(45deg, #17a2b8, #138496);
    }

    .card {
      border-radius: 20px;
      border: none;
      overflow: hidden;
    }

    .card:hover {
    }

    .table {
      border-radius: 15px;
      overflow: hidden;
    }

    .table thead th {
      background: linear-gradient(45deg, #2c3e50, #34495e);
      color: white;
      border: none;
      font-weight: 600;
    }

    .alert {
      border-radius: 15px;
      border: none;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .form-control, .form-select {
      border-radius: 12px;
      border: 2px solid #e9ecef;
      transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
      border-color: #3498db;
      box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in-up {
      animation: fadeInUp 0.6s ease-out;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .main-content {
        margin-left: 0;
        width: 100%;
        border-radius: 0;
      }
    }
  </style>
</head>
<body>
<div class="d-flex">
  {{-- Sidebar --}}
  <div class="text-white sidebar">
    <div class="p-4">
      <a href="/" class="d-flex align-items-center mb-4 mb-md-0 me-md-auto text-white text-decoration-none">
        <i class="fas fa-utensils me-3" style="font-size: 2rem; color: #f39c12;"></i>
        <span class="brand-logo">KulinerApp</span>
      </a>
      <hr class="border-light">
      <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
            <a href="/dashboard" class="nav-link text-white {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
            </li>
            <li>
            <a href="/tempat-makan" class="nav-link text-white {{ request()->is('tempat-makan*') ? 'active' : '' }}">
                <i class="fas fa-store me-2"></i> Tempat Makan
            </a>
            </li>
            <li>
            <a href="/kategori" class="nav-link text-white {{ request()->is('kategori*') ? 'active' : '' }}">
                <i class="fas fa-tags me-2"></i> Kategori
            </a>
            </li>
            <li>
            <a href="/ulasan" class="nav-link text-white {{ request()->is('ulasan*') ? 'active' : '' }}">
                <i class="fas fa-star me-2"></i> Ulasan
            </a>
            </li>
            <li>
            <a href="/promo" class="nav-link text-white {{ request()->is('promo*') ? 'active' : '' }}">
                <i class="fas fa-gift me-2"></i> Promosi
            </a>
            </li>
        </ul>

    </div>

    {{-- Profil di bawah --}}
    <div class="p-4 border-top border-secondary">
      @auth
        <div class="user-profile">
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
              <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=3498db&color=fff" alt="user" width="40" height="40" class="rounded-circle me-3">
              <div>
                <strong>{{ Auth::user()->name }}</strong>
                <small class="d-block text-muted">{{ Auth::user()->email }}</small>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Keluar</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      @else
        <div class="text-center">
          <a href="{{ route('login') }}" class="btn btn-outline-light w-100">
            <i class="fas fa-sign-in-alt me-2"></i> Login
          </a>
        </div>
      @endauth
    </div>
  </div>

  {{-- Konten Utama --}}
  <div class="main-content fade-in-up">
    @yield('content')
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
