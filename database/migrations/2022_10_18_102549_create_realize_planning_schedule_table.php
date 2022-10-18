<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizePlanningScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realize_planning_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lpj_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('kegiatan');
            $table->text('notes');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('lpj_id')
                ->references('id')
                ->on('lpj')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realize_planning_schedule');
    }
}
