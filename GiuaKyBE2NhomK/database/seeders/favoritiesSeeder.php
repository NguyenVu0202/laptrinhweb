<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class favoritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorities')->insert([
            [
                'favorite_name' => 'Ăn',
                'favorite_description' => 'Ăn bằng tô',
            ],
            [
                'favorite_name' => 'Ngủ',
                'favorite_description' => 'Ngủ quá giờ trưa',
            ],
            [
                'favorite_name' => 'Chơi',
                'favorite_description' => 'Chơi game sáng đêm',
            ],
        ]);
    }
}
