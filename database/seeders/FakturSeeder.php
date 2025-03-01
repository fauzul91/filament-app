<?php

namespace Database\Seeders;

use App\Models\FakturModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FakturModel::factory()->count(10)->create();
    }
}
