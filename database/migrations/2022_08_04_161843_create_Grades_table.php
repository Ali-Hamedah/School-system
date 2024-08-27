<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGradesTable extends Migration
{

    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();//كان   $table->increments()
            $table->timestamps();
            $table->string('Name');
            $table->string('Notes');
        });
    }

    public function down()
    {
        Schema::drop('grades');
    }
}
