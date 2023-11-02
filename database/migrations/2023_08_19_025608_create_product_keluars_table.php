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
        Schema::create('product_keluars', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->unsigned();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->integer('harga');
            // $table->string('image')->default(null);
            $table->integer('qty');
            $table->date('tgl_keluar');
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
        Schema::dropIfExists('product_keluars');
    }
};