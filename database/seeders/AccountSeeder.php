<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'account_id' => 1,
            'role_id' => 1,
            'gender_id' => 2,
            'first_name' => "Hazel",
            'last_name' => "Levesque",
            'email' => "admin@gmail.com",
            'display_picture_link' => "accounts/hazel.png",
            'password' => bcrypt("admin12345")
        ]);

        DB::table('accounts')->insert([
            'account_id' => 2,
            'role_id' => 2,
            'gender_id' => 1,
            'first_name' => "Percy",
            'last_name' => "Jackson",
            'email' => "user@gmail.com",
            'display_picture_link' => "accounts/percy.png",
            'password' => bcrypt("user12345")
        ]);

        DB::table('accounts')->insert([
            'account_id' => 3,
            'role_id' => 2,
            'gender_id' => 1,
            'first_name' => "Dummy",
            'last_name' => "One",
            'email' => "user1@gmail.com",
            'display_picture_link' => "accounts/percy.png",
            'password' => bcrypt("user12345")
        ]);

        DB::table('accounts')->insert([
            'account_id' => 4,
            'role_id' => 2,
            'gender_id' => 1,
            'first_name' => "Dummy",
            'last_name' => "Two",
            'email' => "user2@gmail.com",
            'display_picture_link' => "accounts/percy.png",
            'password' => bcrypt("user12345")
        ]);

        DB::table('accounts')->insert([
            'account_id' => 5,
            'role_id' => 2,
            'gender_id' => 1,
            'first_name' => "Dummy",
            'last_name' => "Three",
            'email' => "user3@gmail.com",
            'display_picture_link' => "accounts/percy.png",
            'password' => bcrypt("user12345")
        ]);
    }
}
