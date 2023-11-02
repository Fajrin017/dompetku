<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            // $table->string('excerpt');
            $table->string('mak');
            $table->string('output');
            $table->string('jenis_realisasi');
            $table->string('no_dokumen');
            // $table->decimal('nilai_realisasi', 9, 3);
            $table->string('nilai_realisasi');
            $table->date('tgl_realisasi');
            $table->string('mekanisme');
            $table->string('penyedia');
            $table->string('dokumen')->nullable();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
