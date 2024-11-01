<?php

namespace Database\Seeders;

use App\Models\AppModels\TestDemo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TestDemo::factory(100)->create();
    }
}
