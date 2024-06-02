<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    public $timestamps = false;
    public $primaryKey = 'maNhaSX';
    protected $table = 'nhasanxuat';
    use HasFactory;
    
    public function sanphams(){
        return $this->hasMany(SanPham::class, 'maNhaSX', 'maNhaSX');
    }
}