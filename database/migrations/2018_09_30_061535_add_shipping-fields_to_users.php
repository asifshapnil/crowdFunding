<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShippingFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('shipping_prefecture')->nullable();
          $table->string('shipping_municipility')->nullable();
          $table->string('shipping_room_num')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        //   dropIfColumn('shipping_prefecture');
        //   dropIfColumn('shipping_municipility');
        //   dropIfColumn('shipping_room_num');
          $table->dropColumn(['shipping_prefecture', 'shipping_municipility', 'shipping_room_num']);

        });
    }
}
