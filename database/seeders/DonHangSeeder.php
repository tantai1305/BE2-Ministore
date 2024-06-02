<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('donhang')->insert([
            // ['maDonHang'=>'DH01','tenDonHang'=>'Điện thoại Xiaomi Redmi 12 4GB',
            // 'soLuong'=>2,'tienHang'=>7800000,'tongTien'=>7800000,'maSP'=>'SP01','maKH'=>'KH01'],

            // ['maDonHang'=>'DH02','tenDonHang'=>'Điện thoại Xiaomi Redmi 12 4GB',
            // 'soLuong'=>1,'tienHang'=>3900000,'tongTien'=>3900000,'maSP'=>'SP01','maKH'=>'KH02'],
        ]);
    }
}
