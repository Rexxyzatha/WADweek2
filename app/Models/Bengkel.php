<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bengkel extends Model
{
    use HasFactory;
    
    // Tambahkan baris ini
    protected $fillable = ['nama_bengkel', 'alamat', 'no_telp'];
}