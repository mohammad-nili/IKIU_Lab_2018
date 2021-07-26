<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reception', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id')->unsigned();
            $table->foreign('request_id')->references('id')->on('request')->onDelete('cascade');
            $table->string('sample_count')->nullable();
            $table->string('reception_status')->nullable();
            $table->string('failed_reception_cause')->nullable();
            $table->string('exam_code')->nullable();
            $table->dateTime('transfer_date')->nullable();
            $table->string('transfer_method')->nullable();
            $table->integer('total_cost')->nullable();
            $table->integer('discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('payment')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('tracking_code')->nullable();
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
        Schema::dropIfExists('reception');
    }
}
