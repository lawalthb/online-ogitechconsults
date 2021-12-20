<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->string('company');
            $table->string('website')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('banner_size')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('amount');
            $table->string('add_info')->nullable();
            
            $table->integer('status')->default('1')->comment('1=pending, 2=active, 3=banned');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('advertises');
    }
}
