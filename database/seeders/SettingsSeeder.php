<?php

namespace Database\Seeders;

use App\Models\HakModels\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // type - text checkbox select
        // production settings
        Settings::create(['name' => 'app_name', 'model' => 'app', 'data' => '', 'default_value' => 'HSBR-Apps', 'value' => 'HSBR-Apps', 'type' => 'production', 'group' => 'application', 'parent' => 'application', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'app_version', 'model' => 'app', 'data' => '', 'default_value' => '1.01', 'value' => '1.01', 'type' => 'production', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'hak_version', 'model' => 'app', 'data' => '', 'default_value' => '1.01', 'value' => '1.01', 'type' => 'production', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'page_title_prefix', 'model' => 'app', 'data' => '', 'default_value' => 'HSBR', 'value' => 'HSBR', 'type' => 'production', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'page_title_suffix', 'model' => 'app', 'data' => '', 'default_value' => 'online', 'value' => 'Online', 'type' => 'production', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'page_title_description', 'model' => 'app', 'data' => '', 'default_value' => 'default description', 'value' => 'default description', 'type' => 'production', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'page_title_message', 'model' => 'app', 'data' => '', 'default_value' => 'default message', 'value' => 'default message', 'type' => 'production', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'developer_company_name', 'model' => 'app', 'data' => '', 'default_value' => 'HSBR-Apps', 'value' => 'HSBR-Apps', 'type' => 'production', 'group' => 'developer', 'parent' => 'developer_company', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'developer_company_website', 'model' => 'app', 'data' => '', 'default_value' => 'https://hsbr.app', 'value' => 'https://hsbr.app', 'type' => 'production', 'group' => 'developer', 'parent' => 'developer_company', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'developer_company_mail', 'model' => 'app', 'data' => '', 'default_value' => 'hisham@hsbr.app', 'value' => 'hisham@hsbr.app', 'type' => 'production', 'group' => 'developer', 'parent' => 'developer_company', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'developer_app_starting_year', 'model' => 'app', 'data' => '', 'default_value' => '2020', 'value' => '2020', 'type' => 'production', 'group' => 'developer', 'parent' => 'developer_company', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        // admin settings
        Settings::create(['name' => 'logo_sidebar', 'model' => 'app', 'data' => '', 'default_value' => '1', 'value' => '1', 'type' => 'admin', 'group' => 'logo', 'parent' => 'logo_sidebar', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Enable"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sidebar_mini', 'model' => 'app', 'data' => '', 'default_value' => '1', 'value' => '1', 'type' => 'admin', 'group' => 'logo', 'parent' => 'logo_sidebar', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Enable"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sign', 'model' => 'app', 'data' => '', 'default_value' => '1', 'value' => '1', 'type' => 'admin', 'group' => 'logo', 'parent' => 'logo_sign', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Enable"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sign_mini', 'model' => 'app', 'data' => '', 'default_value' => '1', 'value' => '1', 'type' => 'admin', 'group' => 'logo', 'parent' => 'logo_sign', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Enable"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sign_with_google', 'model' => 'app', 'data' => '', 'default_value' => '1', 'value' => '1', 'type' => 'admin', 'group' => 'logo', 'parent' => 'logo_sign', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Enable"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sign_with_facebook', 'model' => 'app', 'data' => '', 'default_value' => '1', 'value' => '1', 'type' => 'admin', 'group' => 'logo', 'parent' => 'logo_sign', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Enable"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'layout_sidebar_collapse', 'model' => 'app', 'data' => '', 'default_value' => 'null', 'value' => '1', 'type' => 'admin', 'group' => 'layout', 'parent' => 'default', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Enable"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'layout_dark_mode', 'model' => 'app', 'data' => '', 'default_value' => 'null', 'value' => '1', 'type' => 'admin', 'group' => 'layout', 'parent' => 'default', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Enable"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'default_status', 'model' => 'app', 'data' => '', 'default_value' => '1', 'value' => '1', 'type' => 'admin', 'group' => 'default', 'parent' => 'default_value', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Always Active"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'default_time_zone', 'model' => 'app', 'data' => '', 'default_value' => '1', 'value' => '1', 'type' => 'admin', 'group' => 'default', 'parent' => 'default_value', 'default_by' => '1', 'form_type' => 'checkbox', 'form_data' => ["Allow"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'permission_view', 'model' => 'app', 'data' => '', 'default_value' => 'list', 'value' => 'list', 'type' => 'admin', 'group' => 'default', 'parent' => 'default_value', 'default_by' => '1', 'form_type' => 'select', 'form_data' => ["list", "group"], 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'edit_days', 'model' => 'app', 'data' => '', 'default_value' => '7', 'value' => '7', 'type' => 'admin', 'group' => 'default', 'parent' => 'default_value', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'delete_days', 'model' => 'app', 'data' => '', 'default_value' => '7', 'value' => '7', 'type' => 'admin', 'group' => 'default', 'parent' => 'default_value', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        // test demo model settings
        Settings::create(attributes: ['name' => 'test_demo_pdf_paper_size', 'model' => 'TestDemo', 'data' => '', 'default_value' => 'a4', 'value' => 'a4', 'type' => 'admin', 'group' => 'model', 'parent' => 'test_demo', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);


        Settings::create(attributes: ['name' => 'test_demo_view', 'model' => 'TestDemo', 'data' => '', 'default_value' => 'plain', 'value' => 'plain', 'type' => 'admin', 'group' => 'model', 'parent' => 'test_demo', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'test_demo_icon', 'model' => 'TestDemo', 'data' => '', 'default_value' => 'fa-user', 'value' => 'fa-user', 'type' => 'admin', 'group' => 'model', 'parent' => 'test_demo', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'test_demo_color', 'model' => 'TestDemo', 'data' => '', 'default_value' => 'yellow', 'value' => 'yellow', 'type' => 'admin', 'group' => 'model', 'parent' => 'test_demo', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        // user model settings
        Settings::create(['name' => 'user_icon', 'model' => 'user', 'data' => '', 'default_value' => 'fa-user', 'value' => 'fa-user', 'type' => 'admin', 'group' => 'model', 'parent' => 'user', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'user_color', 'model' => 'user', 'data' => '', 'default_value' => 'yellow', 'value' => 'yellow', 'type' => 'admin', 'group' => 'model', 'parent' => 'user', 'default_by' => '1', 'form_type' => 'text', 'form_data' => '', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
    }
}
