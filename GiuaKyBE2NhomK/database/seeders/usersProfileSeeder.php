<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usersProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_profile')->insert([
            [
                'user_id' => '1',
                'first_name' => 'Nguyễn',
                'last_name' => 'Vũ',
                'sex' => 'Nam',
                'phone' => '0915728314',
                'address' => 'Năm Căn',
            ],

            [
                'user_id' => '2',
                'first_name' => 'Phạm',
                'last_name' => 'Tuấn',
                'sex' => 'Nam',
                'phone' => '0915728315',
                'address' => 'Cà Mau',
            ],
            [
                'user_id' => '3',
                'first_name' => 'Thành',
                'last_name' => 'Công',
                'sex' => 'Nam',
                'phone' => '0915728316',
                'address' => 'Bình Dương',
            ],
        ]);
    }
}
