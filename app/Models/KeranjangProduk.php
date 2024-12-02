<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangProduk extends Model
{
    use HasFactory;

    protected $table = 'keranjang_produk';

    protected $fillable = [
        'id_genteng',
        'totall_produk',
        'sub_total'
    ];

    public function keranjangGenteng() {
        return $this->belongsTo(Genteng::class,'id_genteng');
    }

}
