<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KulinerApp - Temukan Tempat Makan Terbaik</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            * {
                font-family: 'Poppins', sans-serif;
            }

            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                overflow-x: hidden;
            }

            .hero-section {
                min-height: 100vh;
                display: flex;
                align-items: center;
                position: relative;
                overflow: hidden;
            }

            .hero-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
                opacity: 0.3;
            }

            .hero-content {
                position: relative;
                z-index: 2;
            }

            .hero-title {
                font-size: 4rem;
                font-weight: 700;
                background: linear-gradient(45deg, #ffffff, #f8f9fa);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 1rem;
            }

            .hero-subtitle {
                font-size: 1.25rem;
                color: rgba(255, 255, 255, 0.9);
                margin-bottom: 2rem;
            }

            .btn-hero {
                border-radius: 50px;
                padding: 12px 30px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 1px;
                border: none;
                position: relative;
                overflow: hidden;
            }

            .btn-primary-hero {
                background: linear-gradient(45deg, #3498db, #2980b9);
                color: white;
                box-shadow: 0 10px 30px rgba(52, 152, 219, 0.3);
            }

            .btn-outline-hero {
                background: transparent;
                color: white;
                border: 2px solid white;
                box-shadow: 0 10px 30px rgba(255, 255, 255, 0.2);
            }

            .floating-card {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                padding: 2rem;
            }

            .feature-card {
                background: rgba(255, 255, 255, 0.95);
                border-radius: 20px;
                padding: 2rem;
                text-align: center;
                border: none;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            }

            .feature-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
                background: linear-gradient(45deg, #667eea, #764ba2);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .navbar {
                background: rgba(255, 255, 255, 0.1) !important;
                backdrop-filter: blur(10px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            }

            .navbar-brand {
                font-weight: 700;
                font-size: 1.5rem;
                background: linear-gradient(45deg, #f39c12, #e67e22);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .nav-link {
                color: white !important;
                font-weight: 500;
                border-radius: 10px;
                margin: 0 5px;
            }

            .nav-link:hover {
                background: rgba(255, 255, 255, 0.2);
            }

            .stats-section {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                padding: 3rem 0;
                margin: 4rem 0;
            }

            .stat-item {
                text-align: center;
                color: white;
            }

            .stat-number {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
            }

            .stat-label {
                font-size: 1.1rem;
                opacity: 0.9;
            }

            .footer {
                background: rgba(0, 0, 0, 0.3);
                backdrop-filter: blur(10px);
                color: white;
                padding: 2rem 0;
                margin-top: 4rem;
            }

            .social-links a {
                color: white;
                font-size: 1.5rem;
                margin: 0 10px;
            }

            .social-links a:hover {
                color: #f39c12;
            }

            @media (max-width: 768px) {
                .hero-title {
                    font-size: 2.5rem;
                }

                .hero-subtitle {
                    font-size: 1rem;
                }

                .floating-card {
                    margin-top: 2rem;
                }
            }
        </style>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-utensils me-2"></i>KulinerApp
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 hero-content">
                        <h1 class="hero-title">
                            Temukan Tempat Makan Terbaik
                        </h1>
                        <p class="hero-subtitle">
                            Jelajahi berbagai tempat makan, cafe, dan restoran favorit.
                            Dapatkan ulasan terpercaya dan temukan pengalaman kuliner yang tak terlupakan.
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary-hero btn-hero">
                                <i class="fas fa-home me-2"></i>Dashboard
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="floating-card">
                            <div class="row text-center">
                                <div class="col-6 mb-3">
                                    <div class="feature-card">
                                        <i class="fas fa-store feature-icon"></i>
                                        <h5>{{ $tempatMakanCount }} Tempat</h5>
                                        <p class="text-muted">Tempat makan terbaik</p>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div class="feature-card">
                                        <i class="fas fa-star feature-icon"></i>
                                        <h5>{{ $ulasanCount }} Ulasan</h5>
                                        <p class="text-muted">Ulasan terpercaya</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="feature-card">
                                        <i class="fas fa-tags feature-icon"></i>
                                        <h5>{{ $kategoriCount }} Kategori</h5>
                                        <p class="text-muted">Pilihan beragam</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="feature-card">
                                        <i class="fas fa-gift feature-icon"></i>
                                        <h5>{{ $promoCount }} Promo</h5>
                                        <p class="text-muted">Penawaran menarik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-5">
            <div class="container">
                <div class="row text-center mb-5">
                    <div class="col-12">
                        <h2 class="text-white fw-bold mb-3">Mengapa Memilih KulinerApp?</h2>
                        <p class="text-white-50">Platform terbaik untuk menemukan tempat makan favorit Anda</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card h-100">
                            <i class="fas fa-search feature-icon"></i>
                            <h4 class="fw-bold mb-3">Cari Mudah</h4>
                            <p class="text-muted">
                                Temukan tempat makan dengan mudah menggunakan fitur pencarian dan filter yang canggih.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card h-100">
                            <i class="fas fa-star feature-icon"></i>
                            <h4 class="fw-bold mb-3">Ulasan Terpercaya</h4>
                            <p class="text-muted">
                                Baca ulasan dari pengguna lain untuk mendapatkan informasi yang akurat dan terpercaya.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card h-100">
                            <i class="fas fa-gift feature-icon"></i>
                            <h4 class="fw-bold mb-3">Promo Menarik</h4>
                            <p class="text-muted">
                                Dapatkan informasi promo dan penawaran menarik dari berbagai tempat makan.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card h-100">
                            <i class="fas fa-mobile-alt feature-icon"></i>
                            <h4 class="fw-bold mb-3">Responsive Design</h4>
                            <p class="text-muted">
                                Akses dari mana saja dengan desain yang responsif dan user-friendly.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card h-100">
                            <i class="fas fa-users feature-icon"></i>
                            <h4 class="fw-bold mb-3">Komunitas Aktif</h4>
                            <p class="text-muted">
                                Bergabung dengan komunitas pecinta kuliner yang aktif dan informatif.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="feature-card h-100">
                            <i class="fas fa-shield-alt feature-icon"></i>
                            <h4 class="fw-bold mb-3">Aman & Terpercaya</h4>
                            <p class="text-muted">
                                Platform yang aman dengan data yang terverifikasi dan terpercaya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="stat-item">
                            <div class="stat-number">{{ $tempatMakanCount }}</div>
                            <div class="stat-label">Tempat Makan</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="stat-item">
                            <div class="stat-number">{{ $ulasanCount }}</div>
                            <div class="stat-label">Ulasan</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="stat-item">
                            <div class="stat-number">{{ $kategoriCount }}</div>
                            <div class="stat-label">Kategori</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="stat-item">
                            <div class="stat-number">{{ $promoCount }}</div>
                            <div class="stat-label">Promo</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="mb-3">
                            <i class="fas fa-utensils me-2"></i>KulinerApp
                        </h5>
                        <p class="mb-3">
                            Platform terbaik untuk menemukan dan mengevaluasi tempat makan favorit Anda.
                            Jelajahi berbagai pilihan kuliner dengan ulasan terpercaya.
                        </p>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <h6 class="mb-3">Ikuti Kami</h6>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="my-4" style="border-color: rgba(255,255,255,0.2);">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="mb-0">
                            &copy; 2024 KulinerApp. Dibuat dengan <i class="fas fa-heart text-danger"></i> untuk pecinta kuliner.
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
