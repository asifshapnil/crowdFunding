<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneticToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('phonetic_first')->nullable();
          $table->string('phonetic_last')->nullable();


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
        //   dropIfColumn('phonetic_first');
        //   dropIfColumn('phonetic_last');

          $table->dropColumn(['phonetic_first', 'phonetic_last']);

        });
    }
}
