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
        Schema::create('playlist_song', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playlist_id')->constrained()->onDelete('cascade');
            $table->foreignId('song_id')->constrained()->onDelete('cascade');
            $table->integer('order')->nullable(); // Thứ tự bài hát trong playlist
            $table->timestamps(); // Thời gian thêm bài hát vào playlist

            // Tạo index cho cặp khóa ngoại, đảm bảo một bài hát không bị thêm 2 lần vào 1 playlist
            $table->unique(['playlist_id', 'song_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // Xóa bảng đi khi rollback.
        Schema::dropIfExists('playlist_song');
    }
};