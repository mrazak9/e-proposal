<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizeBudgetExpenditureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realize_budget_expenditure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lpj_id')->unsigned();
            $table->string('name');
            $table->text('qty');
            $table->text('price');
            $table->text('total');
            $table->integer('type_anggaran_id')->unsigned();
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
        Schema::dropIfExists('realize_budget_expenditure');
    }
}
