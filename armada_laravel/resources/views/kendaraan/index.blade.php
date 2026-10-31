<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kendaraan - Modul Armada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand navbararmada shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="{{ route('home') }}">Armada Kendaraan</a>
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('kendaraan.daftar') }}">Daftar Kendaraan</a>
                </li>
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn nav-link text-white">Logout ({{ Auth::user()->username }})</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="kartu">
                    <h2 class="h4 fw-bold mb-3 border-bottom pb-2">Formulir Tambah Kendaraan</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kendaraan.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Nomor_Plat" class="form-label fw-semibold">Nomor Plat</label>
                            <input type="text" class="form-control" id="Nomor_Plat" name="Nomor_Plat"
                                placeholder="Contoh: B 1234 ABC" value="{{ old('Nomor_Plat') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="Merk" class="form-label fw-semibold">Merk Kendaraan</label>
                            <input type="text" class="form-control" id="Merk" name="Merk"
                                placeholder="Contoh: Toyota Avanza" value="{{ old('Merk') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="Tahun_Pembuatan" class="form-label fw-semibold">Tahun Pembuatan</label>
                            <input type="number" class="form-control" id="Tahun_Pembuatan" name="Tahun_Pembuatan"
                                placeholder="Contoh: 2022" value="{{ old('Tahun_Pembuatan') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="Tipe_Transmisi" class="form-label fw-semibold">Tipe Transmisi</label>
                            <select class="form-select" id="Tipe_Transmisi" name="Tipe_Transmisi" required>
                                <option value="" disabled selected>-- Pilih Tipe Transmisi --</option>
                                <option value="Automatic" @selected(old('Tipe_Transmisi') == 'Automatic')>Automatic</option>
                                <option value="Manual" @selected(old('Tipe_Transmisi') == 'Manual')>Manual</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2">Kirim / Simpan Kendaraan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
