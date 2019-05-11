<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id');   // format: date + 5 number
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('order_status_code');
            
            $table->unsignedInteger('amount')->default(0);
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->unsignedBigInteger('payment_method_id');
            $table->string('trade_no', 20)->nullable();
            $table->string('trans_ip', 15)->nullable();
            $table->string('escrow_bank', 10)->nullable();
            $table->mediumText('description')->nullable();

            $table->unsignedBigInteger('credit_card_id');
            $table->unsignedBigInteger('atm_id');

            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            /* Foreign keys */
            $table->primary('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('credit_card_id')->references('id')->on('credit_card');
            $table->foreign('atm_id')->references('id')->on('atm');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
