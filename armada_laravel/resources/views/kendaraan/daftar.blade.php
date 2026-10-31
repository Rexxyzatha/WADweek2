<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Armada Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand navbararmada shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="{{ route('home') }}">Armada Kendaraan</a>
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="{{ route('kendaraan.daftar') }}">Daftar Kendaraan</a>
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

    <main class="container py-4">
        <div class="mb-4">
            <h2 class="fw-bold mb-1">Daftar Armada Kendaraan</h2>
            <p class="text-muted">Data kendaraan yang terdaftar pada sistem.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="kartu">
            <div class="table-responsive">
                <table class="my-table table table-bordered table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" style="width: 5%;">No</th>
                            <th scope="col">Nomor Plat</th>
                            <th scope="col">Merk</th>
                            <th scope="col" class="text-center">Tahun Pembuatan</th>
                            <th scope="col" class="text-center">Tipe Transmisi</th>
                            @auth
                                <th scope="col" class="text-center" style="width: 18%;">Aksi</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kendaraan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $item->Nomor_Plat }}</td>
                                <td>{{ $item->Merk }}</td>
                                <td class="text-center">{{ $item->Tahun_Pembuatan }}</td>
                                <td class="text-center">
                                    <span class="badge bg-secondary">{{ $item->Tipe_Transmisi }}</span>
                                </td>
                                @auth
                                    <td class="text-center">
                                        <a href="{{ route('kendaraan.edit', $item) }}"
                                            class="btn btn-sm btn-warning me-1">Edit</a>
                                        <form action="{{ route('kendaraan.destroy', $item) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kendaraan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                @endauth
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ Auth::check() ? 6 : 5 }}" class="text-center text-muted py-4">Belum ada data kendaraan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>
