<?php

namespace Database\Seeders;

use App\Models\HakModels\Permission;
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
        Permission::create(['name' => 'Developer Settings', 'group' => 'Default', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Admin Settings', 'group' => 'Default', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'App Settings', 'group' => 'Default', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Dashboard Menu', 'group' => 'Default', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Sidebar Search Menu', 'group' => 'Default', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Default

        // => Test Demo
        Permission::create(['name' => 'Test Demo Create', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Show', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Edit', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Delete', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Force Delete', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Restore', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Settings', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Excel Import', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo PDF Export', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Filter', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo History', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Test Demo Read Action', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Code', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Name', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Local Name', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Test Demo Read Description', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Edit Description', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Default', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Status', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Deleted At', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Created By', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Created At', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Updated By', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Updated At', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Test Demo Table Export Excel', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Table Export PDF', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Table Print', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Table Copy', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Table Column Visible', 'group' => 'Test Demo', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Test Demo

        // => Settings
        Permission::create(['name' => 'Settings Create', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Show', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Edit', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Delete', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Force Delete', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Restore', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Settings', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Excel Import', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings PDF Export', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Filter', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings History', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Settings Read Action', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Code', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Local Name', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Settings Read Description', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Edit Description', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Default', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Status', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Deleted At', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Created By', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Created At', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Updated By', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Updated At', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Settings Table Export Excel', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Table Export PDF', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Table Print', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Table Copy', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Table Column Visible', 'group' => 'Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Settings


        // <= Activity Log
        Permission::create(['name' => 'Activity Log Show', 'group' => 'Activity Log', 'parent' => 'Activity Log', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Log Delete', 'group' => 'Activity Log', 'parent' => 'Activity Log', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Log Force Delete', 'group' => 'Activity Log', 'parent' => 'Activity Log', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Log Restore', 'group' => 'Activity Log', 'parent' => 'Activity Log', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // => Activity Log


        // <= User Profile
        Permission::create(['name' => 'User Profile Edit', 'group' => 'User Profile', 'parent' => 'User Profile', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Profile Avatar Edit', 'group' => 'User Profile', 'parent' => 'User Profile', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // => User Profile


        // => User
        Permission::create(['name' => 'User Create', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Show', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Edit', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Delete', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Force Delete', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Restore', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Settings', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Excel Import', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User PDF Export', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Filter', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User History', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'User Read Action', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Name', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Email', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Email Verified At', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Gender', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Personal Settings', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Settings', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Avatar', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Time Zone', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'User Read Description', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Edit Description', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Default', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Status', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Deleted At', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Created By', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Created At', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Updated By', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Updated At', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'User Table Export Excel', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Export PDF', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Print', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Copy', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Column Visible', 'group' => 'User', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= User

        // => Permission
        Permission::create(['name' => 'Permission Create', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Show', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Edit', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Delete', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Force Delete', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Restore', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Settings', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Excel Import', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission PDF Export', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Filter', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission History', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Permission Read Action', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Name', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Parent', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Guard Name ', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Permission Read Description', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Edit Description', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Default', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Status', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Deleted At', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Created By', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Created At', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Updated By', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Updated At', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Permission Table Export Excel', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Export PDF', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Print', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Copy', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Column Visible', 'group' => 'Permission', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Permission

        // => Role
        Permission::create(['name' => 'Role Create', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Show', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Edit', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Delete', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Force Delete', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Restore', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Settings', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Excel Import', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role PDF Export', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Filter', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role History', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Role Read Action', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Name', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Guard Name', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Role Read Description', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Edit Description', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Default', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Status', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Deleted At', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Created By', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Created At', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Updated By', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Updated At', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Role Table Export Excel', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table Export PDF', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table Print', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table Copy', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table Column Visible', 'group' => 'Role', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Role

        // => Dashboard

        //users
        Permission::create(['name' => 'Dashboard Users Total Users', 'group' => 'Dashboard', 'parent' => 'Users', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Dashboard Users InActive Users', 'group' => 'Dashboard', 'parent' => 'Users', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Dashboard Users Deleted Users', 'group' => 'Dashboard', 'parent' => 'Users', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Dashboard Users Pending Email Verifications Users', 'group' => 'Dashboard', 'parent' => 'Users', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        //jobs
        Permission::create(['name' => 'Dashboard Jobs Failed Jobs', 'group' => 'Dashboard', 'parent' => 'Jobs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Dashboard Jobs Pending Jobs', 'group' => 'Dashboard', 'parent' => 'Jobs', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Dashboard
    }
}
