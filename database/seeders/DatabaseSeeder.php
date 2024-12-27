<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HakModels\Activity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Globally disable activity logging
        config(['activitylog.enabled' => false]);


        // Run all seeders
        $this->call([
            DeveloperUserSeeder::class,
            PermissionSeeder::class,
            SettingsSeeder::class,
            TimeZoneSeeder::class,
            TestDemoSeeder::class,


            UpdateDataSeeder::class,
        ]);

        // Re-enable logging
        config(['activitylog.enabled' => true]);
    }
}
