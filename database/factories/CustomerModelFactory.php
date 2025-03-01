<?php

namespace Database\Factories;

use App\Models\CustomerModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerModel>
 */
class CustomerModelFactory extends Factory
{
    protected $model = CustomerModel::class;

    public function definition(): array
    {
        return [
            'nama_customer' => fake()->name(),
            'kode_customer' => fake()->bothify('CUST-####'),
            'alamat_customer' => fake()->address(),
            'telepon_customer' => fake()->phoneNumber()
        ];
    }
}
