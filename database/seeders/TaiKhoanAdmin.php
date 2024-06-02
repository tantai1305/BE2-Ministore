<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaiKhoanAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taikhoanadmin')->insert([
            // ['Email'=>'admin1',
            // 'HoTen'=>'Nguyen Tan Tai',
            // 'MK'=> Hash::make('12345')],
            // ['Email'=>'admin2',
            // 'HoTen'=>'Tran Thi Ngoc Linh',
            // 'MK'=> Hash::make('11111')],
            // ['Email'=>'admin3',
            // 'HoTen'=>'Tran Ba Trieu',
            // 'MK'=> Hash::make('22222')],
            // ['Email'=>'admin4',
            // 'HoTen'=>'Nguyen Quang Vinh',
            // 'MK'=> Hash::make('33333')],
            // ['Email'=>'admin5',
            // 'HoTen'=>'Nguyen Hieu Nghia',
            // 'MK'=> Hash::make('444444')]
        ]);
    }
}
