<?php

use App\Exam;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cost');
            $table->enum('category',[
                Exam::Chemical      ,
                Exam::Rock_MECHABICS,
                Exam::Agriculture,
                Exam::Physics,
                Exam::Metallurgy,
                Exam::Metal_Shaping,
                Exam::Mineral_Shaping,
                Exam::Pro_Metallurgy,
                Exam::Irrigation,
                Exam::Soil_Mechanics,
                Exam::Geology,
            ]);
            $table->enum('category_en',[
                'Chemical       ',
                'Rock_MECHABICS ',
                'Agriculture ',
                'Physics ',
                'Metallurgy ',
                'Metal_Shaping ',
                'Mineral_Shaping ',
                'Pro_Metallurgy ',
                'Irrigation ',
                'Soil_Mechanics ',
                'Geology ',
            ]);
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('request_exam', function (Blueprint $table) {
            $table->integer('exam_id')->unsigned();
            $table->foreign('exam_id')->references('id')->on('exam')->onDelete('cascade');
            $table->integer('request_id')->unsigned();
            $table->foreign('request_id')->references('id')->on('request')->onDelete('cascade');
            $table->primary(['request_id','exam_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam');
        Schema::dropIfExists('request_exam');
    }
}
