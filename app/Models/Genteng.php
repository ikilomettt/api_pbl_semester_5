<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genteng extends Model
{
    use HasFactory;

    protected $table = 'gentengs';


    protected $fillable = [
        'gambar',
        'nama_genteng',
        'nama_perusahaan',
        'harga',
        'deskripsi',
        'panjang_genteng',
        'lebar_genteng',
        'tebal_genteng',
        'warna_genteng',
        'bahan_pembuatan',
        'stok',
        'id_kategori',
    ];

    public function kategoriProduk() {
        return $this->belongsTo(KategoriProduk::class, 'id_kategori','id');
    }

    public function keranjang() {
        return $this->hasMany(KeranjangProduk::class,'id_genteng','id');
    }

    public function chekout() {
        return $this->hasMany(ChekoutProduk::class,'id_genteng','id');
    }

    public $timestamps = true;
}
