<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThaiSP extends Model
{
    public $timestamps = false;
    public $primaryKey = 'MaTrangThai';
    protected $table = 'trangthaisp';
    use HasFactory;

    public function sanphams(){
        return $this->hasOne(SanPham::class, 'MaTrangThai', 'MaTrangThai');
    }
}
