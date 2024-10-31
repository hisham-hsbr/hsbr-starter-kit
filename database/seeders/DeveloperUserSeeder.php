<?php

namespace Database\Seeders;

use App\Models\AppModels\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Developer',
            'email' => 'hisham@hsbr.app',
            'email_verified_at' => '2000-12-1',
            'password' => bcrypt(value: 'hsbr@gmail.com'),
            'created_by' => '1',
            'updated_by' => '1',
            'status' => '1'
        ]);
    }
}
