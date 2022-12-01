<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptOfFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_of_funds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proposal_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('nominal');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('proposal_id')
                ->references('id')
                ->on('proposal')
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
        Schema::dropIfExists('receipt_of_funds');
    }
}
