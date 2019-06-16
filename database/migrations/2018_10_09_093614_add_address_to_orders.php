<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
          $table->string('custom_postal_code')->nullable();
          $table->string('custom_municipility')->nullable();
          $table->string('custom_address')->nullable();
          $table->string('custom_room_no')->nullable();
          $table->string('custom_phone_no')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
        //   dropIfColumn('custom_postal_code');
        //   dropIfColumn('custom_municipility');
        //   dropIfColumn('custom_address');
        //   dropIfColumn('custom_room_no');
        //   dropIfColumn('custom_phone_no');
          $table->dropColumn(['custom_postal_code', 'custom_municipility', 'custom_address', 'custom_room_no', 'custom_phone_no']);

        });
    }
}
