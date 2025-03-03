<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    protected $model = Barang::class;
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->word(),
            'kode_barang' => fake()->bothify('BRG-####'),
            'harga_barang' => fake()->numberBetween(50000, 1000000)
        ];
    }
}
