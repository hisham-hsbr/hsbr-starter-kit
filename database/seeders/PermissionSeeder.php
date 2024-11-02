<?php

namespace Database\Seeders;

use App\Models\AppModels\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // => Default
        Permission::create(['name' => 'Developer Settings', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Admin Settings', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'App Settings', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Dashboard Menu', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Sidebar Search Menu', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Default
    }
}
