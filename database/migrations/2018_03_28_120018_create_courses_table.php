<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->String('name');
             $table->String('img');
            $table->text('summary');
            $table->integer('discount');
            $table->integer('hours');
            $table->integer('status')->default(0);
            $table->integer('level');
            $table->integer('seats');
            $table->integer('branch_id')->unsigned()->index();
            $table->integer('instuctor_id')->unsigned()->index();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('instuctor_id')->references('id')->on('instructors')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
