<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Bengkel - Dasboard Data Mitra Bengkel</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        
        <!-- Header & Tombol Kembali -->
        <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">Edit Data Bengkel</h1>
            <a href="{{ route('bengkel.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white font-medium px-4 py-2 rounded-md transition text-sm">
                &larr; Kembali
            </a>
        </div>

        <!-- Form Edit Bengkel -->
        <form action="{{ route('bengkel.update', $bengkel->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Input Nama Bengkel -->
            <div>
                <label for="nama_bengkel" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Bengkel <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="nama_bengkel" 
                       id="nama_bengkel" 
                       value="{{ old('nama_bengkel', $bengkel->nama_bengkel) }}"
                       placeholder="Contoh: Bengkel Jaya Abadi"
                       class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none @error('nama_bengkel') border-red-500 @else border-gray-300 @enderror"
                       required>
                @error('nama_bengkel')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                    Alamat Lengkap <span class="text-red-500">*</span>
                </label>
                <textarea name="alamat" 
                          id="alamat" 
                          rows="3" 
                          placeholder="Masukkan alamat lokasi bengkel..."
                          class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none @error('alamat') border-red-500 @else border-gray-300 @enderror"
                          required>{{ old('alamat', $bengkel->alamat) }}</textarea>
                @error('alamat')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input No. Telepon -->
            <div>
                <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">
                    No. Telepon <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="no_telp" 
                       id="no_telp" 
                       value="{{ old('no_telp', $bengkel->no_telp) }}"
                       placeholder="Contoh: 081234567890"
                       class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none @error('no_telp') border-red-500 @else border-gray-300 @enderror"
                       required>
                @error('no_telp')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Input Jenis Layanan -->
            <div>
                <label for="jenis_layanan" class="block text-sm font-medium text-gray-700 mb-1">
                    Jenis Layanan <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="jenis_layanan" 
                       id="jenis_layanan" 
                       value="{{ old('jenis_layanan', $bengkel->jenis_layanan) }}"
                       placeholder="Contoh: Servis, Ganti Oli, dll."
                       class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none @error('jenis_layanan') border-red-500 @else border-gray-300 @enderror"
                       required>
                @error('jenis_layanan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('bengkel.index') }}" 
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md transition text-sm flex items-center">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-5 py-2 rounded-md transition text-sm">
                    Perbarui Data
                </button>
            </div>

        </form>

    </div>

</body>
</html>