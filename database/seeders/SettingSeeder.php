<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        Setting::insert([
            [
                'key' => 'site_title',
                'value' => env('APP_NAME', 'Laravel'),
                'comment' => 'Site Title',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'phone',
                'value' => env('SITE_PHONE', '0000-000-000'),
                'comment' => 'Site Title',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'address',
                'value' => env('SITE_ADDRESS', '111 Wellington Road'),
                'comment' => 'Address',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_contact',
                'value' => env('MAIL_CONTACT', 'contact@laraweb.top'),
                'comment' => 'MAIL CONTACT',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'site_domain',
                'value' => env('APP_DOMAIN', 'Laravel'),
                'comment' => 'Site Domain',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'site_ip',
                'value' => env('APP_IP', '127.0.0.1'),
                'comment' => 'Site IP',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'logo_header',
                'value' => 'uploads/settings/logo_header.png',
                'comment' => 'Logo Header',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'logo_footer',
                'value' => 'uploads/settings/logo_footer.png',
                'comment' => 'Logo Footer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_from',
                'value' => env('MAIL_FROM_ADDRESS', 'trieunb08@gmail.com'),
                'comment' => 'Mail From',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_host',
                'value' => env('MAIL_HOST', 'sandbox.smtp.mailtrap.io'),
                'comment' => 'Mail Host',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_port',
                'value' => env('MAIL_PORT', '2525'),
                'comment' => 'Mail Port',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_username',
                'value' => env('MAIL_USERNAME', 'a6b69ae550e778'),
                'comment' => 'Mail Username',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_password',
                'value' => env('MAIL_PASSWORD', '92c01d1f19e51a'),
                'comment' => 'Mail Password',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'mail_encryption',
                'value' => env('MAIL_ENCRYPTION', 'tls'),
                'comment' => 'Mail ENCRYPTION',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
