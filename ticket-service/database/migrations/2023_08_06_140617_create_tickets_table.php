<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('status'); // e.g. 'todo', 'in_progress', 'done'
            $table->string('priority'); // e.g. 'low', 'medium', 'high'
            $table->unsignedBigInteger('user_assigned_id')->nullable();
            $table->unsignedBigInteger('lane_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}