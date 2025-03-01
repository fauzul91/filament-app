<?php

namespace Database\Factories;

use App\Models\CustomerModel;
use App\Models\FakturModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FakturModel>
 */
class FakturModelFactory extends Factory
{
    protected $model = FakturModel::class;
    public function definition(): array
    {
        return [
            'kode_faktur' => fake()->bothify('FAK-#####'),
            'tanggal_faktur' => fake()->date(),
            'kode_customer' => fake()->bothify('CUST-#####'),
            'customer_id' => CustomerModel::factory(), // Menghubungkan dengan customer yang dibuat di factory
            'ket_faktur' => fake()->optional()->sentence(),
            'total' => fake()->numberBetween(100000, 5000000),
            'nominal_charge' => fake()->numberBetween(5000, 50000),
            'charge' => fake()->numberBetween(1, 10),
            'total_final' => function (array $attributes) {
                return $attributes['total'] + $attributes['nominal_charge'];
            },
            'deleted_at' => null, // Untuk soft delete, default-nya null
        ];
    }
}
