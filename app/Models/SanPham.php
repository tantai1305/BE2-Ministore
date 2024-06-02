<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sanpham';
    protected $primaryKey = 'maSP';
    public $incrementing = false;       // Đặt này nếu khóa chính không phải là số tự tăng
    protected $keyType = 'string';
    public function danhmucs(){
        return $this->belongsTo(DanhMuc::class,'idDanhMuc', 'idDanhMuc');
    }
    
    public function nhasanxuats(){
        return $this->belongsTo(NhaSanXuat::class, 'maNhaSX', 'maNhaSX');
    }

    public function trangthaisps(){
        return $this->belongsTo(TrangThaiSP::class, 'MaTrangThai', 'MaTrangThai');
    }

    public function sanphams(){
        return $this->belongsTo(SanPham::class,'maSP','maSP');
    }

    public function getProductDetails($id){
        return self::find($id);
    }
    
    public function scopeSearch($query){
        if (request('key')) {
            $key = request('key');
            $query = $query->where('tenSP','like','%'.$key.'%');
        }
        return $query;
    }
}