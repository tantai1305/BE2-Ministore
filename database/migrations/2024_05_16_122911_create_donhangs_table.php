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
        Schema::create('donhangs', function (Blueprint $table) {
            $table->increments('maDonHang');
            $table->string('tenKhachHang');
            $table->string('email');
            $table->string('sdt');
            $table->string('diaChi');
            $table->string('orderDetails');
            $table->string('ghiChu');
            $table->integer('trangThai')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhangs');
    }
};
