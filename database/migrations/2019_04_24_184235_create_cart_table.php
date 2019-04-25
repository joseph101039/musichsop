<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('album_id')->unsigned();
            $table->integer('number')->unsigned()->default(1);
            $table->timestamps();

            # set the composite primary key
            $table->primary(['user_id', 'album_id']);
            # create 2 foreign key cart(user_id)-->users(id) and cart(album_id)-->album(id)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('album_id')->references('id')->on('albums')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
