<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_produk' => fake()->randomElement(['Minuman', 'Makanan', 'Alat Tulis', 'Alat Kebersihan', 'Perabot RT'])
        ];
    }
}
