<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class postsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => '1',
                'post_name' => 'Tình yêu',
                'post_description' => 'Là ngu',
            ],
            [
                'user_id' => '1',
                'post_name' => 'Kim Dung',
                'post_description' => 'Tiểu thuyết gia kiếm hiệp',
            ],
            [
                'user_id' => '2',
                'post_name' => 'Ông lão đánh cá',
                'post_description' => 'Và con cá ổng đánh',
            ],
            [
                'user_id' => '2',
                'post_name' => 'Buồn thì làm sao?',
                'post_description' => 'Xách ba lô lên và đi',
            ],
            [
                'user_id' => '3',
                'post_name' => 'Thế giới có bao nhiêu người',
                'post_description' => '8 tỷ người',
            ],
            [
                'user_id' => '3',
                'post_name' => '1 đời gặp được mấy người',
                'post_description' => 'Trên dưới 1 ngàn người thôi',
            ],
        ]);
    }
}
