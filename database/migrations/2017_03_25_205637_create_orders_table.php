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
        Schema::create('orders', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('total_price');
            $table->string('phone');
            $table->string('address');
            $table->string('zip_code');
            $table->string('city');
            $table->string('country');
            $table->text('comment')->nullable();
            $table->boolean('is_paid');
            $table->boolean('is_sent');
            $table->boolean('is_delivered');
            $table->date('paiement_date')->nullable();
            $table->date('sending_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
