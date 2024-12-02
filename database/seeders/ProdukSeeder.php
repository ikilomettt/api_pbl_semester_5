<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gentengs')->insert([
            // Produk kategori Genteng Tanah Liat
            [
                'gambar' => 'genteng_tanah_liat_1.jpg',
                'nama_genteng' => 'Genteng Tanah Liat Merah',
                'nama_perusahaan' => 'Perusahaan A',
                'harga' => 2000.00,
                'deskripsi' => 'Genteng tanah liat merah berkualitas tinggi.',
                'panjang_genteng' => '30 cm',
                'lebar_genteng' => '20 cm',
                'tebal_genteng' => '1 cm',
                'warna_genteng' => 'Merah',
                'bahan_pembuatan' => 'Tanah Liat',
                'stok' => '100',
                'id_kategori' => 1,
            ],
            [
                'gambar' => 'genteng_tanah_liat_2.jpg',
                'nama_genteng' => 'Genteng Tanah Liat Coklat',
                'nama_perusahaan' => 'Perusahaan A',
                'harga' => 2200.00,
                'deskripsi' => 'Genteng tanah liat warna coklat dengan ketahanan tinggi.',
                'panjang_genteng' => '28 cm',
                'lebar_genteng' => '18 cm',
                'tebal_genteng' => '1.2 cm',
                'warna_genteng' => 'Coklat',
                'bahan_pembuatan' => 'Tanah Liat',
                'stok' => '150',
                'id_kategori' => 1,
            ],
            [
                'gambar' => 'genteng_tanah_liat_3.jpg',
                'nama_genteng' => 'Genteng Tanah Liat Abu-Abu',
                'nama_perusahaan' => 'Perusahaan B',
                'harga' => 2300.00,
                'deskripsi' => 'Genteng tanah liat warna abu-abu, cocok untuk semua iklim.',
                'panjang_genteng' => '32 cm',
                'lebar_genteng' => '22 cm',
                'tebal_genteng' => '1 cm',
                'warna_genteng' => 'Abu-Abu',
                'bahan_pembuatan' => 'Tanah Liat',
                'stok' => '80',
                'id_kategori' => 1,
            ],

            // Produk kategori Genteng Keramik
            [
                'gambar' => 'genteng_keramik_1.jpg',
                'nama_genteng' => 'Genteng Keramik Glossy',
                'nama_perusahaan' => 'Perusahaan C',
                'harga' => 5000.00,
                'deskripsi' => 'Genteng keramik dengan lapisan glossy untuk penampilan elegan.',
                'panjang_genteng' => '32 cm',
                'lebar_genteng' => '21 cm',
                'tebal_genteng' => '1.2 cm',
                'warna_genteng' => 'Coklat',
                'bahan_pembuatan' => 'Keramik',
                'stok' => '60',
                'id_kategori' => 2,
            ],
            [
                'gambar' => 'genteng_keramik_2.jpg',
                'nama_genteng' => 'Genteng Keramik Matte',
                'nama_perusahaan' => 'Perusahaan D',
                'harga' => 5200.00,
                'deskripsi' => 'Genteng keramik dengan hasil akhir matte yang mewah.',
                'panjang_genteng' => '30 cm',
                'lebar_genteng' => '20 cm',
                'tebal_genteng' => '1.3 cm',
                'warna_genteng' => 'Merah',
                'bahan_pembuatan' => 'Keramik',
                'stok' => '70',
                'id_kategori' => 2,
            ],
            [
                'gambar' => 'genteng_keramik_3.jpg',
                'nama_genteng' => 'Genteng Keramik Polos',
                'nama_perusahaan' => 'Perusahaan E',
                'harga' => 5100.00,
                'deskripsi' => 'Genteng keramik polos yang cocok untuk berbagai desain rumah.',
                'panjang_genteng' => '29 cm',
                'lebar_genteng' => '19 cm',
                'tebal_genteng' => '1.2 cm',
                'warna_genteng' => 'Abu-Abu',
                'bahan_pembuatan' => 'Keramik',
                'stok' => '40',
                'id_kategori' => 2,
            ],

            // Produk kategori Genteng Beton
            [
                'gambar' => 'genteng_beton_1.jpg',
                'nama_genteng' => 'Genteng Beton Tahan Lama',
                'nama_perusahaan' => 'Perusahaan F',
                'harga' => 7500.00,
                'deskripsi' => 'Genteng beton berkualitas tinggi untuk bangunan kokoh.',
                'panjang_genteng' => '35 cm',
                'lebar_genteng' => '22 cm',
                'tebal_genteng' => '1.5 cm',
                'warna_genteng' => 'Abu-Abu',
                'bahan_pembuatan' => 'Beton',
                'stok' => '75',
                'id_kategori' => 3,
            ],
            [
                'gambar' => 'genteng_beton_2.jpg',
                'nama_genteng' => 'Genteng Beton Merah',
                'nama_perusahaan' => 'Perusahaan G',
                'harga' => 7800.00,
                'deskripsi' => 'Genteng beton dengan warna merah elegan.',
                'panjang_genteng' => '34 cm',
                'lebar_genteng' => '23 cm',
                'tebal_genteng' => '1.4 cm',
                'warna_genteng' => 'Merah',
                'bahan_pembuatan' => 'Beton',
                'stok' => '50',
                'id_kategori' => 3,
            ],
            [
                'gambar' => 'genteng_beton_3.jpg',
                'nama_genteng' => 'Genteng Beton Coklat',
                'nama_perusahaan' => 'Perusahaan H',
                'harga' => 7700.00,
                'deskripsi' => 'Genteng beton warna coklat tahan lama.',
                'panjang_genteng' => '36 cm',
                'lebar_genteng' => '24 cm',
                'tebal_genteng' => '1.5 cm',
                'warna_genteng' => 'Coklat',
                'bahan_pembuatan' => 'Beton',
                'stok' => '65',
                'id_kategori' => 3,
            ],
            [
                'gambar' => 'genteng_beton_4.jpg',
                'nama_genteng' => 'Genteng Beton Abu-Abu',
                'nama_perusahaan' => 'Perusahaan I',
                'harga' => 7900.00,
                'deskripsi' => 'Genteng beton abu-abu untuk desain modern.',
                'panjang_genteng' => '33 cm',
                'lebar_genteng' => '20 cm',
                'tebal_genteng' => '1.4 cm',
                'warna_genteng' => 'Abu-Abu',
                'bahan_pembuatan' => 'Beton',
                'stok' => '45',
                'id_kategori' => 3,
            ]
        ]);
    }
}
