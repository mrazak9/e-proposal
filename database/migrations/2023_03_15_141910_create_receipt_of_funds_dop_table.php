<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptOfFundsDopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_of_funds_dop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dop_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('nominal');
            $table->date('tanggal');
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
        Schema::dropIfExists('receipt_of_funds_dop');
    }
}
