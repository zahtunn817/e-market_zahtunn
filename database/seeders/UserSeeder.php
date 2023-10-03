<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'password' => bcrypt('password'),
                'akses_id' => '1'
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'akses_id' => '2'
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt('password'),
                'akses_id' => '3'
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
