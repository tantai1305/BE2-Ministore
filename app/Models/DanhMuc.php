<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    public $primaryKey = 'idDanhMuc';
    public $timestamps = false;
    protected $table = 'danhmuc';
    use HasFactory;

    protected $fillable = [
        'idDanhMuc',
        'tenDanhMuc',
    ];

    public function sanphams(){
        return $this->hasMany(SanPham::class,'idDanhMuc','idDanhMuc');
    }
}
