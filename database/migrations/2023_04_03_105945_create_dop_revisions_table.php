<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDopRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dop_revisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dop_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('revision');
            $table->timestamps();

            $table->foreign('dop_id')
                ->references('id')
                ->on('dops')
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
        Schema::dropIfExists('dop_revisions');
    }
}
