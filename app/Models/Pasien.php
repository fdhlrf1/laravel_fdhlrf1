<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $fillable = [
        'nama_pasien',
        'alamat',
        'no_telepon',
        'id_rumah_sakit',
    ];

    public function rumahsakit(): BelongsTo
    {
        return $this->belongsTo(RumahSakit::class, 'id_rumah_sakit', 'id');
    }
}