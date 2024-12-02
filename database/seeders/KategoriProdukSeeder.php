<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriProduk::create([
            'nama_kategori' => 'atap'
        ]);

        KategoriProduk::create([
            'nama_kategori' => 'sampingan'
        ]);

        KategoriProduk::create([
            'nama_kategori' => 'hiasan'
        ]);
    }
}
