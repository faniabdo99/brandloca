<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration{
    public function up(){
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('rate');
            $table->integer('product_id');
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('review');
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
        Schema::dropIfExists('reviews');
    }
}
