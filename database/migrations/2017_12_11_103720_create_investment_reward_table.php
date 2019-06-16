<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentRewardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_rewards', function (Blueprint $table) {
            $table->increments('id');

            

            $table->integer('investment_id')->unsigned();
            $table->foreign('investment_id')->references('id')->on('investments')->onDelete('cascade');

            $table->integer('reward_id')->unsigned();
            $table->foreign('reward_id')->references('id')->on('reward')->onDelete('cascade');
            
            $table->integer('quantity');
            $table->float('total');

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
        Schema::dropIfExists('investment_rewards');
    }
}
