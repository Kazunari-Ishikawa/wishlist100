<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WishItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'cate1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'cate2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'name' => 'cate3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('lists')->insert([
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('items')->insert([
            'list_id' => '1',
             'category_id' => '1',
             'text' => 'sample1',
             'done_flg' => false,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
        ]);
        DB::table('items')->insert([
            'list_id' => '1',
             'category_id' => '2',
             'text' => 'sample2',
             'done_flg' => false,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
        ]);
        DB::table('items')->insert([
            'list_id' => '1',
             'category_id' => '2',
             'text' => 'sample3',
             'done_flg' => false,
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
        ]);
    }
}
