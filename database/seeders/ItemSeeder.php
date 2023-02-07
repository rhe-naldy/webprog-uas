<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'item_id' => 1,
            'item_name' => "Vegetable 1",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 1000000
        ]);

        DB::table('items')->insert([
            'item_id' => 2,
            'item_name' => "Vegetable 2",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 1200000
        ]);

        DB::table('items')->insert([
            'item_id' => 3,
            'item_name' => "Vegetable 3",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 1500000
        ]);

        DB::table('items')->insert([
            'item_id' => 4,
            'item_name' => "Vegetable 4",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 1350000
        ]);

        DB::table('items')->insert([
            'item_id' => 5,
            'item_name' => "Vegetable 5",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 2000000
        ]);

        DB::table('items')->insert([
            'item_id' => 6,
            'item_name' => "Vegetable 6",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 3250000
        ]);

        DB::table('items')->insert([
            'item_id' => 7,
            'item_name' => "Vegetable 7",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 2100000
        ]);

        DB::table('items')->insert([
            'item_id' => 8,
            'item_name' => "Vegetable 8",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 2150000
        ]);

        DB::table('items')->insert([
            'item_id' => 9,
            'item_name' => "Vegetable 9",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 2600000
        ]);

        DB::table('items')->insert([
            'item_id' => 10,
            'item_name' => "Vegetable 10",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 12000000
        ]);

        DB::table('items')->insert([
            'item_id' => 11,
            'item_name' => "Vegetable 11",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 13000000
        ]);

        DB::table('items')->insert([
            'item_id' => 12,
            'item_name' => "Vegetable 12",
            'item_desc' => "LIMITED VEGETABLE!

            Vegetables are parts of plants that are consumed by humans or other animals as food. This limited vegetable is the only one in the world because of its size and color.

            Note: This vegetable won 1st place at Canna UK National Giant Vegetables Championship.",
            'price' => 9000000
        ]);
    }
}
