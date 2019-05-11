<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

    /**
    * Access the table depends on the payment method in order table.
    **/
class CreateAtmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atm', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('pay_bank_code', 10);
            $table->string('payer_account_5code', 5);
            $table->timestamp('expire_time');
            $table->string('bank_code', 10);
            $table->string('code_no', 30);
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
        Schema::dropIfExists('atm');
    }
}
