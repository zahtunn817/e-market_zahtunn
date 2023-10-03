<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produk;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode_barang' => 'K' . sprintf('%08d', fake()->unique()->numberBetween(1, 99999999)),
            'produk_id' => fake()->randomElement(Produk::select('id')->get()),
            'nama_barang' => fake()->randomElement(['Indomie', 'Teh Pucuk', 'Joyko', 'Nuvo', 'California']),
            'satuan' => fake()->randomElement(['pcs', 'item', 'lusin']),
            'harga_jual' => fake()->numberBetween(5000, 100000),
            'stok' => fake()->numberBetween(1, 1000),
            'ditarik' => fake()->numberBetween(1, 1000),
            'user_id' => '2'
        ];
    }
}
