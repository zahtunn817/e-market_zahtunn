<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akses')->insert([[
            'id' => '1',
            'hak_akses' => 'owner',
            'keterangan' => 'Dapat mengakses semuanya.'
        ], [
            'id' => '2',
            'hak_akses' => 'admin',
            'keterangan' => 'Dapat mengakses sebagian.'
        ], [
            'id' => '3',
            'hak_akses' => 'petugas',
            'keterangan' => 'Dapat mengakses sedikit.'
        ]]);
    }
}
