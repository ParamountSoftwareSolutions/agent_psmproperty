<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserSetting::insert([
            [
                'user_id' => 10,
                'key' => 'whats_app_module',
                'status' => 1,
            ],
            [
                'user_id' => 10,
                'key' => 'email_module',
                'status' => 1,
            ],
            [
                'user_id' => 10,
                'key' => 'sms_module',
                'status' => 1,
            ],
            [
                'user_id' => 10,
                'key' => 'facebook_lead_module',
                'status' => 1,
            ],
        ]);
    }
}
