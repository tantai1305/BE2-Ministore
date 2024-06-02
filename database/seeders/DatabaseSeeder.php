<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(trangthaispSeeder::class);
        $this->call(TaiKhoanKhachSeeder::class);
        $this->call(NhaSanXuatSeeder::class);
        $this->call(TaiKhoanAdmin::class);
        $this->call(DanhMucSeeder::class);
        $this->call(SanPhamSeeder::class);
        $this->call(DonHangSeeder::class);
        $this->call(BinhLuanSeeder::class);
    }
}