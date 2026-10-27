<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    // 1. Menampilkan seluruh data bengkel (Bisa diakses Admin & User)
    public function index()
    {
        $bengkels = Bengkel::all();
        return view('bengkel.index', compact('bengkels'));
    }

    // 2. Menampilkan form untuk menambah bengkel (Khusus Admin)
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('bengkel.index')->with('error', 'Anda tidak memiliki akses untuk menambah data.');
        }

        return view('bengkel.create');
    }

    // 3. Menyimpan data bengkel baru ke database (Khusus Admin)
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('bengkel.index')->with('error', 'Anda tidak memiliki akses untuk menambah data.');
        }

        $request->validate([
            'nama_bengkel'  => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
            'jenis_layanan' => 'required',
        ]);

        Bengkel::create($request->all());

        return redirect()->route('bengkel.index')->with('success', 'Data bengkel berhasil ditambahkan!');
    }

    // 4. Menampilkan form edit data bengkel (Khusus Admin)
    public function edit($id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('bengkel.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data.');
        }

        $bengkel = Bengkel::findOrFail($id);
        return view('bengkel.edit', compact('bengkel'));
    }

    // 5. Memperbarui data bengkel di database (Khusus Admin)
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('bengkel.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data.');
        }

        $request->validate([
            'nama_bengkel'  => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
            'jenis_layanan' => 'required',
        ]);

        $bengkel = Bengkel::findOrFail($id);
        $bengkel->update($request->all());

        return redirect()->route('bengkel.index')->with('success', 'Data bengkel berhasil diperbarui!');
    }

    // 6. Menghapus data bengkel yang ada (Khusus Admin)
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('bengkel.index')->with('error', 'Anda tidak memiliki akses untuk menghapus data.');
        }

        $bengkel = Bengkel::findOrFail($id);
        $bengkel->delete();

        return redirect()->route('bengkel.index')->with('success', 'Data bengkel berhasil dihapus!');
    }
}