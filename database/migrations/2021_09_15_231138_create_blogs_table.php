<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            // cascade untuk menghapus semua tabel yg berelasi foreign key
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('categori_id')->constrained('categoris')->onDelete('cascade');
            $table->string('judul');
            $table->string('image')->nullable();
            $table->longText('content');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('blogs');
    }
}
