<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';
    protected $primaryKey = null; // Composite key
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'NIM',
        'Kode_mk',
    ];

    // Override getKeyName for composite key
    public function getKeyName()
    {
        return ['NIM', 'Kode_mk'];
    }

    // Relationship: KRS belongs to Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaAkademik::class, 'NIM', 'NIM');
    }

    // Relationship: KRS belongs to Matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'Kode_mk', 'Kode_mk');
    }
}
