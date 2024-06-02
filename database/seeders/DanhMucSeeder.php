<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('danhmuc')->insert([
            ['idDanhMuc'=>'1','tenDanhMuc'=>'Điện Thoại'],
            ['idDanhMuc'=>'2','tenDanhMuc'=>'Laptop'],
            ['idDanhMuc'=>'3','tenDanhMuc'=>'Tablet'],
            ['idDanhMuc'=>'4','tenDanhMuc'=>'Loa'],
            ['idDanhMuc'=>'5','tenDanhMuc'=>'Smart Watch'],
            ['idDanhMuc'=>'6','tenDanhMuc'=>'Apple Watch'],
            ['idDanhMuc'=>'7','tenDanhMuc'=>'Sạc dự phòng'],
            ['idDanhMuc'=>'8','tenDanhMuc'=>'Đồng hồ điện tử'],
            ['idDanhMuc'=>'9','tenDanhMuc'=>'PC Gaming'],
            ['idDanhMuc'=>'10','tenDanhMuc'=>'PC Working']
        ]);
        
    }
}
