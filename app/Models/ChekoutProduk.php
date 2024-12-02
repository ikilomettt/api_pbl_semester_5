<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChekoutProduk extends Model
{
    use HasFactory;

    protected $table = 'chekout_produks';
    protected $fillable = [
        'id_user',
        'id_genteng',
        'id_alamat',
        'jumlah_barang',
        'method_pembayaran',
        'pengantaran',
        'sub_total',
        'status'
    ];

    public function pembeli() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function genteng() {
        return $this->belongsTo(Genteng::class, 'id_genteng');
    }

    public function alamat() {
        return $this->belongsTo(Alamat::class, 'id_alamat');
    }

}
