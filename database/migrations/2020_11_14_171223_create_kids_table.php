<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateKidsTable extends Migration{
    public function up(){
        Schema::create('kids', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('dob');
            $table->integer('parent_id');
            $table->integer('times_won')->default(0);
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
        Schema::dropIfExists('kids');
    }
}
