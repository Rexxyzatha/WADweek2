<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bengkel Mitra - Bengkel App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6 font-sans">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md border border-gray-200">
        
        <!-- Header & Navigasi -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Daftar Bengkel Mitra</h1>
                <p class="text-sm text-gray-500">
                    Logged in as: <span class="font-semibold text-blue-600">{{ auth()->user()->name }}</span> 
                    (<span class="uppercase font-bold text-xs bg-gray-200 text-gray-700 px-2 py-0.5 rounded">{{ auth()->user()->role ?? 'user' }}</span>)
                </p>
            </div>

            <div class="flex items-center gap-3">
                <!-- Tombol Tambah Bengkel (Hanya untuk Admin) -->
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('bengkel.create') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg transition text-sm shadow-sm flex items-center gap-1">
                        + Tambah Bengkel
                    </a>
                @endif

                <!-- Tombol Logout -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" 
                            class="bg-red-500 hover:bg-red-600 text-white font-medium px-4 py-2 rounded-lg transition text-sm shadow-sm">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Notifikasi Pesan Sukses / Error -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tabel Data Bengkel dengan Garis Pembatas Vertikal -->
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-left text-sm text-gray-700 border-collapse">
                <thead class="bg-gray-50 text-blue-950 font-extrabold uppercase text-xs border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3.5 text-center tracking-wide border-r border-gray-200">NO</th>
                        <th class="px-4 py-3.5 tracking-wide border-r border-gray-200">NAMA BENGKEL</th>
                        <th class="px-4 py-3.5 tracking-wide border-r border-gray-200">ALAMAT</th>
                        <th class="px-4 py-3.5 tracking-wide border-r border-gray-200">NO. TELEPON</th>
                        <th class="px-4 py-3.5 tracking-wide border-r border-gray-200">JENIS LAYANAN</th>
                        <!-- Kolom Aksi Hanya Muncul Jika Admin -->
                        @if(auth()->user()->role === 'admin')
                            <th class="px-4 py-3.5 text-center tracking-wide">AKSI</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($bengkels as $index => $b)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-center font-medium border-r border-gray-200">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-900 border-r border-gray-200">{{ $b->nama_bengkel }}</td>
                            <td class="px-4 py-3 border-r border-gray-200">{{ $b->alamat }}</td>
                            <td class="px-4 py-3 border-r border-gray-200">{{ $b->no_telp }}</td>
                            <td class="px-4 py-3 border-r border-gray-200">{{ $b->jenis_layanan }}</td>
                            
                            <!-- Tombol Edit & Hapus (Hanya Muncul Jika Admin) -->
                            @if(auth()->user()->role === 'admin')
                                <td class="px-4 py-3 text-center">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('bengkel.edit', $b->id) }}" 
                                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1.5 rounded-md text-xs font-medium transition">
                                            Edit
                                        </a>
                                        <form action="{{ route('bengkel.destroy', $b->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-xs font-medium transition" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'admin' ? 6 : 5 }}" class="text-center py-6 text-gray-400">
                                Belum ada data bengkel mitra.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>