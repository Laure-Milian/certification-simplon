<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table){
          $table->string('first_name');
          $table->string('last_name');
          $table->integer('products_total_price');
          $table->string('shipping_method');
          $table->integer('shipping_cost');
          $table->string('paiement_method');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function(Blueprint $table) {
          $table->dropColumn('first_name');
          $table->dropColumn('last_name');
          $table->dropColumn('products_total_price');
          $table->dropColumn('shipping_method');
          $table->dropColumn('shipping_cost');
          $table->dropColumn('paiement_method');
        });
    }
}