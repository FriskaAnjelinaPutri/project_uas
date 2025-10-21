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

    .main-content {
      padding: 2rem;
      width: 100%;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      min-height: 100vh;
      border-radius: 20px;
      margin: 20px;
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
      .main-content {
        margin: 10px;
        border-radius: 15px;
      }
    }
  </style>
</head>
<body>
<div class="d-flex justify-content-center">
  {{-- Konten Utama --}}
  <div class="main-content fade-in-up">
    @yield('content')
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
