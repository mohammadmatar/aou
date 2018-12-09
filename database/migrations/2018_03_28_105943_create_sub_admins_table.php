<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_admin_id')->unique();
            $table->string('img')->default('sub.png'); 
            $table->string('password');
            $table->String('name');
            $table->text('Address');

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
        Schema::dropIfExists('sub_admins');
    }
}
