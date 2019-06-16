<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('phonetic')->nullable();
            $table->string('url')->nullable();
            $table->text('profile')->nullable();
            $table->date('dob')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('division')->nullable();
            $table->string('municipility')->nullable();
            $table->string('address')->nullable();
            $table->string('room_no')->nullable();
            $table->string('phone_no')->nullable();
            $table->integer('sex')->default(1)->comment('1=male, 2=female');
            
            $table->boolean('status')->default(true)->comment('0=inactive, 1=active');
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
        Schema::dropIfExists('profile');
    }
}
