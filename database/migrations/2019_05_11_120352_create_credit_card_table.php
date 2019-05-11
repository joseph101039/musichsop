<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

    /**
    * Access the table depends on the payment method in order table.
    **/

class CreateCreditCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_card', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('card_number', 19);  // non-encryption format for testing
            $table->string('respond_code', 5);
            $table->string('auth', 6);
            $table->timestamp('auth_time');
            $table->string('auth_bank', 10);
            $table->string('exp', 4);
            $table->unsignedInteger('inst');
            $table->unsignedInteger('inst_first');
            $table->unsignedInteger('inst_each');
            $table->string('eci', 2);
            $table->unsignedMediumInteger('red_amt');
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
        Schema::dropIfExists('credit_card');
    }
}
