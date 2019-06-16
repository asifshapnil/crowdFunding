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
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('order_no');
            
            $table->integer('qty');
            $table->double('total_point');
            $table->double('account_point');
            $table->double('purchase_point');

            $table->integer('delivery_option');
            $table->date('delivery_date')->nullable()->comment('1=unspecified, 2=custom, 3=urgent');
            $table->integer('delivery_time')->nullable()->comment('1=morning, 2=12-14, 3=14-16, 4=16-18, 5=18-20');

            $table->string('name')->nullable();
            $table->string('number')->nullable();
            $table->string('cvv')->nullable();
            $table->string('exp_month')->nullable();
            $table->string('exp_year')->nullable();

            $table->text('payment_details')->nullable();
     
            $table->integer('status')->default(0)->comment('0=pending, 1=approved, 2=delivered, 3=hold, 4=rejected');
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
        Schema::dropIfExists('orders');
    }
}
