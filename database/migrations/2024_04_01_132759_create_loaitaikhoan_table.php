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
        Schema::create('taikhoankhach', function (Blueprint $table) {
            $table->increments('maKH');
            $table->string('email')->unique();
            $table->string('matKhau');
            $table->string('soDienThoai')->unique();
            $table->longText('diaChi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taikhoankhach');
    }
};