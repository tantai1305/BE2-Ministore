<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaiKhoanKhachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taikhoankhach')->insert([
            // ['maKH'=>'KH01',
            // 'email'=>'thuytien@gmail.com',
            // 'matKhau'=>Hash::make('123456'),
            // 'soDienThoai'=>'0923456123',
            // 'diaChi'=>'Số 37 đường Nguyễn Viết Xuân, Tổ 4, Khu Phố 3, Thị trấn Củ Chi, Huyện Củ Chi, TP Hồ Chí Minh'],
            // ['maKH'=>'KH02',
            // 'email'=>'ngoclinh@gmail.com',
            // 'matKhau'=>Hash::make('234567'),
            // 'soDienThoai'=>'0765436754',
            // 'diaChi'=>'48 Bùi Thị He, Tổ 3, Khu phố 8, Thị trấn Củ Chi, Huyện Củ Chi, TP Hồ Chí Minh'],
            // ['maKH'=>'KH03',
            // 'email'=>'tantai@gmail.com',
            // 'matKhau'=>Hash::make('345678'),
            // 'soDienThoai'=>'0895436547',
            // 'diaChi'=>'Số 54 Nguyễn Viết Xuân, Khu phố 3, Thị trấn Củ Chi, Huyện Củ Chi, TP Hồ Chí Minh'],
            // ['maKH'=>'KH04',
            // 'email'=>'kimngan@gmail.com',
            // 'matKhau'=>Hash::make('456789'),
            // 'soDienThoai'=>'0912765652',
            // 'diaChi'=>'184 Nguyễn Văn Khạ, Tổ 9, Khu phố 3, Thị trấn Củ Chi, Huyện Củ Chi, TP Hồ Chí Minh'],
            // ['maKH'=>'KH05',
            // 'email'=>'batrieu@gmail.com',
            // 'matKhau'=>Hash::make('567891'),
            // 'soDienThoai'=>'0128765891',
            // 'diaChi'=>'24 Đường Nguyễn Thị Triệu, khu phố 2, Thị trấn Củ Chi, Huyện Củ Chi, TP Hồ Chí Minh'],
            // ['maKH'=>'KH06',
            // 'email'=>'thaobui@gmail.com',
            // 'matKhau'=>Hash::make('678910'),
            // 'soDienThoai'=>'0457618172',
            // 'diaChi'=>'Số 16 Đường Nguyễn Thị Triệu, Tổ 10, Khu phố 2, Thị trấn Củ Chi, Huyện Củ Chi, TP Hồ Chí Minh'], 
        ]);
    }
}