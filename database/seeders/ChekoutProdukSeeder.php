<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChekoutProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chekout_produks')->insert([
            [
                'id_user' => 1,
                'id_genteng' => 1,
                'id_alamat' => 1,
                'jumlah_barang' => 10,
                'method_pembayaran' => 'transfer',
                'pengantaran' => 'delivery',
                'sub_total' => 100000.00,
                'bukti_pembayaran' => null,
                'status' => 'sukses',
                'status_pengiriman' => 'dikemas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 1,
                'id_genteng' => 2,
                'id_alamat' => 1,
                'jumlah_barang' => 5,
                'method_pembayaran' => 'cod',
                'pengantaran' => 'pickup',
                'sub_total' => 50000.00,
                'bukti_pembayaran' => null,
                'status' => 'sukses',
                'status_pengiriman' => 'dikemas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 1,
                'id_genteng' => 3,
                'id_alamat' => 1,
                'jumlah_barang' => 8,
                'method_pembayaran' => 'transfer',
                'pengantaran' => 'delivery',
                'sub_total' => 80000.00,
                'bukti_pembayaran' => null,
                'status' => 'sukses',
                'status_pengiriman' => 'dikemas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
