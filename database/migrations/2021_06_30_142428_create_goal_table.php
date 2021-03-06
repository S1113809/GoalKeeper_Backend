<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description', 255);
            $table->integer('current_progress')->default(0);
            $table->integer('step_progress');
            $table->timestamp('start_date');
            $table->timestamp('end_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->bigInteger('subject_id')->unsigned();
        });

        Schema::table('goal', function($table){
            $table->foreign('subject_id')->references('id')->on('subject');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goal');
    }
}
