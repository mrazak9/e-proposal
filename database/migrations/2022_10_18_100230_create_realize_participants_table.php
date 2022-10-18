<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizeParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realize_participants', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('lpj_id')->unsigned();
            $table->integer('participant_type_id')->unsigned();
            $table->integer('participant_total');
            $table->string('notes');

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
        Schema::dropIfExists('realize_participants');
    }
}
