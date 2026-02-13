<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'NIP';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'NIP',
        'Nama',
        'Alamat',
        'Nohp',
    ];

    // Relationship: Dosen mengampu banyak Matakuliah (via pengampu pivot)
    public function matakuliahs()
    {
        return $this->belongsToMany(Matakuliah::class, 'pengampu', 'NIP', 'Kode_mk');
    }

    // Direct relationship to pengampu
    public function pengampus()
    {
        return $this->hasMany(Pengampu::class, 'NIP', 'NIP');
    }
}
