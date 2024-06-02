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
        Schema::create('binhluan', function (Blueprint $table) {
            $table->increments('maBL');
            $table->unsignedInteger('maSP');
            $table->unsignedInteger('maKH');
            $table->longText('danhGia');
            $table->string('hinhAnhKemTheo')->nullable();
            $table->date('ngayDanhGia');

            $table->foreign('maSP')->references('maSP')->on('sanpham')->onDelete('cascade');
            $table->foreign('maKH')->references('maKH')->on('taikhoankhach')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
};