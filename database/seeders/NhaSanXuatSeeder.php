<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NhaSanXuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nhasanxuat')->insert([
            ['maNhaSX'=>'1',
            'tenNhaSX'=>'Samsung'],
            ['maNhaSX'=>'2',
            'tenNhaSX'=>'Oppo'],
            ['maNhaSX'=>'3',
            'tenNhaSX'=>'Xiaomi'],
            ['maNhaSX'=>'4',
            'tenNhaSX'=>'Vivo'],
            ['maNhaSX'=>'5',
            'tenNhaSX'=>'Apple'],

            ['maNhaSX'=>'6',
            'tenNhaSX'=>'HP'],
            ['maNhaSX'=>'7',
            'tenNhaSX'=>'Asus'],
            ['maNhaSX'=>'8',
            'tenNhaSX'=>'Acer'],
            ['maNhaSX'=>'9',
            'tenNhaSX'=>'Lenovo'],
            ['maNhaSX'=>'10',
            'tenNhaSX'=>'Dell'],

        ]);
    }
}
