<?php

namespace Database\Seeders;

use App\Models\AppModels\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // developer settings
        Settings::create(['name' => 'app_name', 'model' => 'app', 'default_value' => 'HSBR', 'group' => 'application', 'parent' => 'application', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'app_version', 'model' => 'app', 'default_value' => '1.1', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'page_title_prefix', 'model' => 'app', 'default_value' => 'HSBR', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'page_title_suffix', 'model' => 'app', 'default_value' => 'online', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'page_title_description', 'model' => 'app', 'default_value' => 'default description', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'page_title_message', 'model' => 'app', 'default_value' => 'default message', 'group' => 'application', 'parent' => 'page', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'developer_company_name', 'model' => 'app', 'default_value' => 'HSBR-Apps', 'group' => 'developer', 'parent' => 'developer_company', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'developer_company_website', 'model' => 'app', 'default_value' => 'https://hsbr.app', 'group' => 'developer', 'parent' => 'developer_company', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'developer_company_mail', 'model' => 'app', 'default_value' => 'hisham@hsbr.app', 'group' => 'developer', 'parent' => 'developer_company', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'developer_app_starting_year', 'model' => 'app', 'default_value' => '2020', 'group' => 'developer', 'parent' => 'developer_company', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'developer_app_endting_year', 'model' => 'app', 'default_value' => '2023', 'group' => 'developer', 'parent' => 'developer_company', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);

        // admin settings
        Settings::create(['name' => 'logo_sidebar', 'model' => 'app', 'default_value' => '1', 'group' => 'logo', 'parent' => 'logo_sidebar', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sidebar_mini', 'model' => 'app', 'default_value' => '1', 'group' => 'logo', 'parent' => 'logo_sidebar', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sign', 'model' => 'app', 'default_value' => '1', 'group' => 'logo', 'parent' => 'logo_sigin', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sign_mini', 'model' => 'app', 'default_value' => '1', 'group' => 'logo', 'parent' => 'logo_sigin', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sign_with_google', 'model' => 'app', 'default_value' => '1', 'group' => 'logo', 'parent' => 'logo_sigin', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'logo_sign_with_facebook', 'model' => 'app', 'default_value' => '1', 'group' => 'logo', 'parent' => 'logo_sigin', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'layout_card_header', 'model' => 'app', 'default_value' => '1', 'group' => 'layout', 'parent' => 'default', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'layout_card_footer', 'model' => 'app', 'default_value' => '1', 'group' => 'layout', 'parent' => 'default', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'layout_sidebar_collapse', 'model' => 'app', 'default_value' => 'null', 'group' => 'layout', 'parent' => 'default', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'layout_dark_mode', 'model' => 'app', 'default_value' => 'null', 'group' => 'layout', 'parent' => 'default', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'default_status', 'model' => 'app', 'default_value' => '1', 'group' => 'default', 'parent' => 'default_value', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'default_time_zone', 'model' => 'app', 'default_value' => '1', 'group' => 'default', 'parent' => 'default_value', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'message_home_toolbar', 'model' => 'app', 'default_value' => 'welcome to my app', 'group' => 'message', 'parent' => 'default', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
        Settings::create(['name' => 'message_test', 'model' => 'app', 'default_value' => 'test message', 'group' => 'message', 'parent' => 'default', 'default_by' => '1', 'description' => 'des', 'status' => '1', 'created_by' => '1', 'updated_by' => '1']);
    }
}
