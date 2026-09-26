<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use Illuminate\Http\Request;

class BengkelController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_bengkel' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Bengkel::create($request->all());

        return redirect()->back()->with('success', 'Data bengkel berhasil ditambahkan!');
    }
}