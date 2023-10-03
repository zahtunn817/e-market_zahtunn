<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barang;
use App\Models\Pembelian;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPembelian>
 */
class DetailPembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idBeli = fake()->randomElement(Pembelian::select('id')->get());
        $idBarang = fake()->randomElement(Barang::select('id')->get());
        $data = Barang::select('harga_jual')->where('id', $idBarang->id)->first();
        $jumlah = fake()->numberBetween(1, 1000);
        return [
            'pembelian_id' => $idBeli,
            'barang_id' => $idBarang,
            'harga_beli' => $data['harga_jual'],
            'jumlah' => $jumlah,
            'sub_total' => $data['harga_jual'] * $jumlah
        ];
    }
}
