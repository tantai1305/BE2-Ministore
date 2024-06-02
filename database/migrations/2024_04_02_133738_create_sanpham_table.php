<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('maSP');
            $table->string('tenSP')->unique();
            $table->integer('giaBan');
            $table->integer('giaGiam')->nullable();
            $table->string('anhDaiDien');
            $table->string('anhChiTiet');
            $table->string('mauSP');
            $table->longText('moTa');
            $table->string('idDanhMuc');
            $table->string('maNhaSX');
            $table->string('MaTrangThai');
            $table->longText('thongSoKyThuat');
            $table->string('soLuongTrongKho');    
            $table->string('active');    
            $table->foreign('MaTrangThai')->references('MaTrangThai')->on('trangthaisp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
};