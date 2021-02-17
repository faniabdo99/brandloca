<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDeleteReasonsTable extends Migration{
    public function up(){
        Schema::create('cart_delete_reasons', function (Blueprint $table) {
            $table->id();
            $table->string('reasons')->nullable();
            $table->text('more_info')->nullable();
            $table->integer('item_id');
            $table->integer('product_id');
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('cart_delete_reasons');
    }
}
