<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('project_category')->onDelete('cascade');

            $table->string('sub_category')->nullable();

            $table->boolean('is_featured')->default(false);


            $table->string('title');
            $table->string('purpose');
            $table->string('beneficiary');
            $table->text('description');
            $table->text('colors')->nullable();
            
            $table->double('budget');
            $table->text('budget_usage_breakdown');

            $table->dateTime('start');
            $table->dateTime('end');
            
            $table->string('featured_image');
            
            $table->integer('status')->default(0)->comment('0=pending for approval, 1=active, 2=completed, 3=hold, 4=rejected');
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
        Schema::dropIfExists('projects');
    }
}
