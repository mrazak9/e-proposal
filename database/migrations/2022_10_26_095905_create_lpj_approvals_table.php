<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpjApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lpj_approvals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lpj_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->boolean('approved');
            $table->integer('level');
            $table->string('date');
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
        Schema::dropIfExists('lpj_approvals');
    }
}
