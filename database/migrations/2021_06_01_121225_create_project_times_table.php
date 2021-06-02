<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_times', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->dateTime('start_time',0);
            $table->dateTime('end_time',0);
            $table->integer('hours');
            $table->string('status');
            $table->text('note');
            $table->integer('task_id');
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
        Schema::dropIfExists('project_times');
    }
}
