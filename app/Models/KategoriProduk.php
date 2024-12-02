<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;

    protected $table = 'kategori_produks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kategori'
    ];

    public function genteng() {
        return $this->hasMany(Genteng::class, 'id_kategori','id');
    }
}
