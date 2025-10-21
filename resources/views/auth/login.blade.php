@extends('layouts.template')

@section('title', 'Login')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100" style="background: #fff;">
    <div class="w-100" style="max-width: 350px;">
        <h3 class="mb-4 text-center">Login</h3>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <small>{{ $errors->first() }}</small>
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" type="password" class="form-control" name="password" required placeholder="Masukkan kata sandi">
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
w
