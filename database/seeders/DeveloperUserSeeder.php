<?php

namespace Database\Seeders;

use App\Models\HakModels\Permission;
use App\Models\HakModels\Role;
use App\Models\HakModels\User;
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
            'gender' => 'male',
            'created_by' => '1',
            'updated_by' => '1',
            'status' => '1'
        ]);

        $role = Role::create(['name' => 'Developer', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        $user_2 = User::create([
            'name' => 'Hisham Basheer',
            'email' => 'hisham.hsbr@gmail.com',
            'gender' => 'male',
            'password' => bcrypt('hsbr@gmail.com'),
            'created_by' => '1',
            'updated_by' => '1',
            'status' => '1'
        ]);
        $role = Role::create(['name' => 'admin', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        $permissions = Permission::whereIn('name', [
            'User Profile Edit',
            'User Read',
            'User Create',
        ])
            ->pluck('id', 'id')
            ->all();


        $role->syncPermissions($permissions);

        $user_2->assignRole([$role->id]);
    }
}
