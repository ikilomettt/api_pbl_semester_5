<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alamats')->insert([
            'users_id' => 1,
            'nama_penerima'=>'slamet',
            'nomor_telepon_penerima'=>'9089901',
            'rt'=> '1',
            'rw'=>'3',
            'dusun'=>'a',
            'desa'=>'e',
            'kecamatan'=>'t',
            'kabupaten'=>'ww',
            'spesifik_alamat'=>'aku adoh',

            ]);
    }
}
