<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Modul Armada Kendaraan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <nav class="navbar navbar-expand navbararmada shadow-sm">
    <div class="container">
      <span class="navbar-brand fw-bold text-white">Armada Kendaraan</span>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('home') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('kendaraan.daftar') }}">Daftar Kendaraan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-white" href="{{ route('login') }}">Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <div class="kartu">
          <h2 class="h4 fw-bold mb-3 border-bottom pb-2">Login Petugas</h2>

          @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
          @endif

          <form action="{{ route('login.proses') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="username" class="form-label fw-semibold">Username</label>
              <input type="text" class="form-control" id="username" name="username"
                     value="{{ old('username') }}" required autofocus placeholder="Masukkan username">
            </div>

            <div class="mb-3">
              <label for="password" class="form-label fw-semibold">Password</label>
              <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password">
            </div>

            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="remember" name="remember">
              <label class="form-check-label" for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Masuk</button>
          </form>
        </div>
      </div>
    </div>
  </main>

</body>
</html>

