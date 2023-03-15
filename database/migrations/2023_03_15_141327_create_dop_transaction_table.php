<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDopTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dop_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dop_id')->unsigned();
            $table->char('category');
            $table->text('amount');
            $table->string('note');
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
        Schema::dropIfExists('dop_transaction');
    }
}
