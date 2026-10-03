<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    // 1. Menampilkan seluruh data bengkel
    public function index()
    {
        $bengkels = Bengkel::all();
        return view('bengkel.index', compact('bengkels'));
    }

    // 2. Menampilkan form untuk menambah bengkel
    public function create()
    {
        return view('bengkel.create');
    }

    // 3. Menyimpan data bengkel baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_bengkel' => 'required',
            'alamat'       => 'required',
            'no_telp'      => 'required',
            'jenis_layanan' => 'required',
        ]);

        Bengkel::create($request->all());

        return redirect()->route('bengkel.index')->with('success', 'Data bengkel berhasil ditambahkan!');
    }

    // 4. Menampilkan form edit data bengkel
    public function edit($id)
    {
        $bengkel = Bengkel::findOrFail($id);
        return view('bengkel.edit', compact('bengkel'));
    }

    // 5. Memperbarui data bengkel di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bengkel' => 'required',
            'alamat'       => 'required',
            'no_telp'      => 'required',
            'jenis_layanan' => 'required',
        ]);

        $bengkel = Bengkel::findOrFail($id);
        $bengkel->update($request->all());

        return redirect()->route('bengkel.index')->with('success', 'Data bengkel berhasil diperbarui!');
    }

    // 6. Menghapus data bengkel yang ada
    public function destroy($id)
    {
        $bengkel = Bengkel::findOrFail($id);
        $bengkel->delete();

        return redirect()->route('bengkel.index')->with('success', 'Data bengkel berhasil dihapus!');
    }
}