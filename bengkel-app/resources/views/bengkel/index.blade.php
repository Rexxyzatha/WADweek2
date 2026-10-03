<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bengkel Mitra</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <!-- Header & Tombol Tambah -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Bengkel Mitra</h1>
            <a href="{{ route('bengkel.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md transition text-sm">
                + Tambah Bengkel
            </a>
        </div>

        <!-- Flash Message Notification -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel Data Bengkel -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-50 text-gray-700 text-xs uppercase font-semibold border-b border-gray-200">
                        <th class="py-3 px-4 border border-gray-200 text-center">NO</th>
                        <th class="py-3 px-4 border border-gray-200">NAMA BENGKEL</th>
                        <th class="py-3 px-4 border border-gray-200">ALAMAT</th>
                        <th class="py-3 px-4 border border-gray-200">NO. TELEPON</th>
                        <th class="py-3 px-4 border border-gray-200">JENIS LAYANAN</th>
                        <th class="py-3 px-4 border border-gray-200 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-sm text-gray-800">
                    @forelse($bengkels as $key => $bengkel)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border border-gray-200 text-center">{{ $key + 1 }}</td>
                            <td class="py-3 px-4 border border-gray-200 font-bold">{{ $bengkel->nama_bengkel }}</td>
                            <td class="py-3 px-4 border border-gray-200">{{ $bengkel->alamat }}</td>
                            <td class="py-3 px-4 border border-gray-200">{{ $bengkel->no_telp }}</td>
                            <!-- Kolom Jenis Layanan yang sebelumnya terlewat -->
                            <td class="py-3 px-4 border border-gray-200">{{ $bengkel->jenis_layanan ?? '-' }}</td>
                            <td class="py-3 px-4 border border-gray-200 text-center">
                                <div class="flex justify-center items-center space-x-2">
                                    <a href="{{ route('bengkel.edit', $bengkel->id) }}" 
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-3 py-1 rounded text-xs">
                                        Edit
                                    </a>
                                    
                                    <form action="{{ route('bengkel.destroy', $bengkel->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus bengkel ini?');" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-600 hover:bg-red-700 text-white font-medium px-3 py-1 rounded text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-6 text-center text-gray-500 border border-gray-200">
                                Belum ada data bengkel yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>