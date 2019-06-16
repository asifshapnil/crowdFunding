<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_details', function (Blueprint $table) {
            $table->increments('id');

            

            $table->integer('investment_id')->unsigned();
            $table->foreign('investment_id')->references('id')->on('investments')->onDelete('cascade');
            
            $table->float('amount');
            $table->integer('payment_method')->comment('1=credit card, 2=paypal');
            $table->text('details')->nullable();

            $table->string('name');
            $table->string('number');
            $table->string('cvv');
            $table->string('exp_month');
            $table->string('exp_year');
     
            $table->boolean('status')->default(true)->comment('true = active, false = inactive');
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
        Schema::dropIfExists('investment_details');
    }
}
