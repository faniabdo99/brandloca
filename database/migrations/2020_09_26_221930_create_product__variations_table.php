<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationsTable extends Migration{

    public function up(){
        Schema::create('product__variations', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('ref_code');
            $table->string('size');
            $table->string('color');
            $table->string('color_code');
            $table->integer('inventory');
            $table->string('status');
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
        Schema::dropIfExists('product__variations');
    }
}
