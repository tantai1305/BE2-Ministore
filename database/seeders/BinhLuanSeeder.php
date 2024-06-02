<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('binhluan')->insert([
            // [
            //     'maBL' => 'BL01',
            //     'maSP' => 'SP01',
            //     'maKH' => 'KH01',
            //     'danhGia' => 'Xài nhanh nóng máy',
            //     'hinhAnhKemTheo' => null,
            //     'ngayDanhGia' => '2024-01-01'
            // ],
            // [
            //     'maBL' => 'BL02',
            //     'maSP' => 'SP01',
            //     'maKH' => 'KH02',
            //     'danhGia' => 'Mới dùng 1 tuần pin tụt nhanh, dùng lác, chụp ảnh xử lý chậm và không được nét lắm, cảm ứng không được mượt lắm, NFC không dùng được một số tính năng khác chưa test... đừng quá tin vào thông số',
            //     'hinhAnhKemTheo' => '1.png',
            //     'ngayDanhGia' => '2020-02-01'
            // ]
        ]);
    }
}
