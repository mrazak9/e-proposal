<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizeScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realize_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lpj_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('kegiatan');
            $table->text('notes');
            $table->string('start_time');
            $table->string('end_time');
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
        Schema::dropIfExists('realize_schedule');
    }
}
