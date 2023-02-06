<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'gender_id' => 1,
            'gender_desc' => "male"
        ]);

        DB::table('genders')->insert([
            'gender_id' => 2,
            'gender_desc' => "female"
        ]);
    }
}
