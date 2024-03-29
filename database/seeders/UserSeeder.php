<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('password'),
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 35,
            'user_id' => 1,
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 24,
            'user_id' => 1,
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 13,
            'user_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'jamaah',
            'email' => 'jamaah@jamaah.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('password'),
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 13,
            'user_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'sekre',
            'email' => 'sekre@sekre.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('password'),
        ]);
        DB::table('user_roles')->insert([
            'role_id' => 24,
            'user_id' => 3,
        ]);
    }
}
