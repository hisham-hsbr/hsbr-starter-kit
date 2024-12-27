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
        Permission::create(['name' => 'Developer Settings', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Admin Settings', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'App Settings', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Dashboard Menu', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Sidebar Search Menu', 'parent' => 'Default', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Default

        // => Test Demo
        Permission::create(['name' => 'Test Demo Create', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Show', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Edit', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Delete', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Force Delete', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Restore', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Settings', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Excel Import', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo PDF Export', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Filter', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo History', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Test Demo Read Code', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Name', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Local Name', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Test Demo Read Description', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Edit Description', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Default', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Status', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Deleted At', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Created By', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Created At', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Updated By', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Read Updated At', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Test Demo Table Export Excel', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Table Export PDF', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Table Print', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Table Copy', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Test Demo Table Column Visible', 'parent' => 'Test Demo', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Test Demo

        // => Settings
        Permission::create(['name' => 'Settings Create', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Show', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Edit', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Delete', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Force Delete', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Restore', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Settings', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Excel Import', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings PDF Export', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Filter', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings History', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Settings Read Code', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Name', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Local Name', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Settings Read Description', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Edit Description', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Default', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Status', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Deleted At', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Created By', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Created At', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Updated By', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Read Updated At', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Settings Table Export Excel', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Table Export PDF', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Table Print', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Table Copy', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Settings Table Column Visible', 'parent' => 'Settings', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Settings


        // <= Activity Log
        Permission::create(['name' => 'Activity Log Show', 'parent' => 'Activity Log', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Log Delete', 'parent' => 'Activity Log', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Log Force Delete', 'parent' => 'Activity Log', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Activity Log Restore', 'parent' => 'Activity Log', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // => Activity Log


        // <= User Profile
        Permission::create(['name' => 'User Profile Edit', 'parent' => 'User Profile', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Profile Avatar Edit', 'parent' => 'User Profile', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Profile Delete', 'parent' => 'User Profile', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Profile Force Delete', 'parent' => 'User Profile', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Profile Restore', 'parent' => 'User Profile', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // => User Profile


        // => User
        Permission::create(['name' => 'User Create', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Show', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Edit', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Delete', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Force Delete', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Restore', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Settings', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Excel Import', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User PDF Export', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Filter', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User History', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'User Read Name', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Email', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Email Verified At', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Gender', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Personal Settings', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Settings', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Avatar', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Time Zone', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'User Read Description', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Edit Description', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Default', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Status', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Deleted At', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Created By', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Created At', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Updated By', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Read Updated At', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'User Table Export Excel', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Export PDF', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Print', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Copy', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'User Table Column Visible', 'parent' => 'User', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= User

        // => Permission
        Permission::create(['name' => 'Permission Create', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Show', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Edit', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Delete', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Force Delete', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Restore', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Settings', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Excel Import', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission PDF Export', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Filter', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission History', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Permission Read Name', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Parent', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Guard Name ', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Permission Read Description', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Edit Description', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Default', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Status', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Deleted At', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Created By', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Created At', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Updated By', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Read Updated At', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Permission Table Export Excel', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Export PDF', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Print', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Copy', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Permission Table Column Visible', 'parent' => 'Permission', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Permission

        // => Role
        Permission::create(['name' => 'Role Create', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Show', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Edit', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Delete', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Force Delete', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Restore', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Settings', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Excel Import', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role PDF Export', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Filter', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role History', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Role Read Name', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Guard Name', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Role Read Description', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Edit Description', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Default', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Status', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Deleted At', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Created By', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Created At', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Updated By', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Read Updated At', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        Permission::create(['name' => 'Role Table Export Excel', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table Export PDF', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table Print', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table Copy', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Permission::create(['name' => 'Role Table Column Visible', 'parent' => 'Role', 'guard_name' => 'web', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // <= Role
    }
}
