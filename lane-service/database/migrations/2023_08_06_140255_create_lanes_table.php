<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanesTable extends Migration
{
    public function up()
    {
        Schema::create('lanes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('board_id');
            $table->timestamps();

            // In case you're connecting services directly via DB (which isn't a best practice for microservices but can be used in some scenarios).
            $table->foreign('board_id')->references('id')->on('boards');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lanes');
    }
}