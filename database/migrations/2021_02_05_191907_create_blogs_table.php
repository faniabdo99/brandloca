<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration{
    public function up(){
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('slug');
            $table->string('keywords');
            $table->text('description');
            $table->text('content');
            $table->integer('user_id');
            $table->integer('is_important')->default(0);
            $table->integer('published')->default(1);
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('blogs');
    }
}
