<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class trangthaispSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trangthaisp')->insert([
            ['MaTrangThai'=>'1',
            'TrangThai'=>'Còn Hàng'],
            ['MaTrangThai'=>'2',
            'TrangThai'=>'Hết Hàng'],
            ['MaTrangThai'=>'3',
            'TrangThai'=>'Ngừng Bán'],
           
        ]);
    }
}
