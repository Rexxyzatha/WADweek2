<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bengkel;
use Illuminate\Http\Request;

class BengkelApiController extends Controller
{
    // GET /api/bengkels (Tampil Semua Data)
    public function index()
    {
        $bengkels = Bengkel::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data bengkel berhasil diambil',
            'data'    => $bengkels
        ], 200);
    }

    // POST /api/bengkels (Tambah Data Baru)
    public function store(Request $request)
    {
        $request->validate([
            'nama_bengkel'  => 'required|string|max:255',
            'alamat'        => 'required|string',
            'no_telp'       => 'required|string',
            'jenis_layanan' => 'required|string',
        ]);

        $bengkel = Bengkel::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data bengkel berhasil ditambahkan',
            'data'    => $bengkel
        ], 201);
    }

    // GET /api/bengkels/{id} (Tampil Detail Data Berdasarkan ID)
    public function show($id)
    {
        $bengkel = Bengkel::find($id);

        if (!$bengkel) {
            return response()->json([
                'success' => false,
                'message' => 'Data bengkel tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data bengkel',
            'data'    => $bengkel
        ], 200);
    }

    // PUT /api/bengkels/{id} (Update Data)
    public function update(Request $request, $id)
    {
        $bengkel = Bengkel::find($id);

        if (!$bengkel) {
            return response()->json([
                'success' => false,
                'message' => 'Data bengkel tidak ditemukan'
            ], 404);
        }

        $bengkel->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data bengkel berhasil diperbarui',
            'data'    => $bengkel
        ], 200);
    }

    // DELETE /api/bengkels/{id} (Hapus Data)
    public function destroy($id)
    {
        $bengkel = Bengkel::find($id);

        if (!$bengkel) {
            return response()->json([
                'success' => false,
                'message' => 'Data bengkel tidak ditemukan'
            ], 404);
        }

        $bengkel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data bengkel berhasil dihapus'
        ], 200);
    }
}