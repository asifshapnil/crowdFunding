<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            
                [
                    'name' => 'Admin',
                    'email' => 'admin@test.com',
                    'password' => '$2y$10$yoISX6e2D.jLyRNG2tDjw.Jen2taeQQNiiDaZ8V69B5xAzyAP00Vq',
                    'login_ip' => '',
                    'last_login_ip' => '',
                    'login_date' => null,
                    'last_login_date' => null,
                    'remember_token' => '',
                    'type' => 1,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],[
                    'name' => 'Super Admin',
                    'email' => 'superadmin@test.com',
                    'password' => '$2y$10$yoISX6e2D.jLyRNG2tDjw.Jen2taeQQNiiDaZ8V69B5xAzyAP00Vq',
                    'login_ip' => '',
                    'last_login_ip' => '',
                    'login_date' => null,
                    'last_login_date' => null,
                    'remember_token' => '',
                    'type' => 2,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            
        ];
        DB::table('admin_users')->insert($admin);

        $user = [
            
                [
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'user@test.com',
                    'password' => '$2y$10$yoISX6e2D.jLyRNG2tDjw.Jen2taeQQNiiDaZ8V69B5xAzyAP00Vq',
                    'is_email_verified' => true,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
        ];
        DB::table('users')->insert($user);
    }
}
