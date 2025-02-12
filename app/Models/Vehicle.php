<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'kota_kabupaten',
        'jenis_kendaraan',
        'jumlah',
    ];

    public function user()
    {   
        return $this->belongsTo(User::class);
    }
}
