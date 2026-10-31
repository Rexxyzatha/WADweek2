<?php

namespace App\Http\Controllers;

use App\Models\ArmadaKendaraan;
use Illuminate\Http\Request;

class ArmadaKendaraanController extends Controller
{
    public function index()
    {
        return view('kendaraan.index');
    }

    public function daftar()
    {
        $kendaraan = ArmadaKendaraan::all();
        return view('kendaraan.daftar', compact('kendaraan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Nomor_Plat' => 'required|string|max:20|unique:armada_kendaraan,Nomor_Plat',
            'Merk' => 'required|string|max:100',
            'Tahun_Pembuatan' => 'required|integer|digits:4',
            'Tipe_Transmisi' => 'required|in:Automatic,Manual',
        ], [
            'Nomor_Plat.unique' => 'Nomor plat sudah terdaftar.',
            'required' => 'Semua kolom wajib diisi.',
        ]);

        ArmadaKendaraan::create($data);

        return redirect()->route('kendaraan.daftar')->with('success', 'Data kendaraan berhasil ditambahkan.');
    }

    public function edit(ArmadaKendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, ArmadaKendaraan $kendaraan)
    {
        $data = $request->validate([
            'Merk'            => 'required|string|max:100',
            'Tahun_Pembuatan' => 'required|integer|digits:4',
            'Tipe_Transmisi'  => 'required|in:Automatic,Manual',
        ], [
            'required' => 'Semua kolom wajib diisi.',
        ]);

        $kendaraan->update($data);

        return redirect()->route('kendaraan.daftar')->with('success', 'Data kendaraan berhasil diperbarui.');
    }

    public function destroy(ArmadaKendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect()->route('kendaraan.daftar')->with('success', 'Data kendaraan berhasil dihapus.');
    }
}