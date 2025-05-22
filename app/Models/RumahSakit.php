<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RumahSakit extends Model
{
    use HasFactory;

    protected $table = 'rumah_sakit';
    protected $fillable = [
        'nama_rumah_sakit',
        'alamat',
        'email',
        'telepon',
    ];

    public function pasien(): HasMany
    {
        return $this->hasMany(Pasien::class, 'id_rumah_sakit', 'id');
    }
}