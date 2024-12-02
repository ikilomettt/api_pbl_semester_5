<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamats';

    protected $fillable = [
        'users_id',
        'nama_penerima',
        'nomor_telepon_penerima',
        'rt',
        'rw',
        'dusun',
        'desa',
        'kecamatan',
        'kabupaten',
        'spesifik_alamat',
    ];

    // Definisikan relasi dengan model User
    public function users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function chekout() {
        return $this->hasMany(ChekoutProduk::class, 'id_alamat');
    }

}
