<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class donhang extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'donhangs'; // Tên bảng
    protected $primaryKey = 'maDonHang'; // Khóa chính
}
