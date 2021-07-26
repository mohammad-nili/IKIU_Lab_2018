<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status')->default(0);
            $table->integer('wait_for')->nullable();
            $table->string('Name');
            $table->text('description')->nullable(); //for (public|new) Requests
            $table->string('request_type');
            $table->string('IN_OUT');
            $table->string('P_N')->nullable(); //mokhareb or geire mokhareb
            $table->string('test_condition')->nullable();
            $table->string('storage_time')->nullable();
            $table->string('suggest_method')->nullable();
            $table->string('request_description')->nullable();
            $table->string('legal_person');
            $table->string('natural_person');
            $table->string('plump')->nullable();
            $table->string('failed_request_cause')->nullable();
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
        Schema::dropIfExists('request');
    }
}
