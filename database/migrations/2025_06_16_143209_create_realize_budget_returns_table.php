<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizeBudgetReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realize_budget_return', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lpj_id');
            $table->unsignedInteger('realize_budget_receipt_id');
            $table->decimal('total', 15, 2);
            $table->date('return_date');
            $table->text('notes')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('lpj_id')->references('id')->on('lpj')->onDelete('cascade');
            $table->foreign('realize_budget_receipt_id')->references('id')->on('realize_budget_receipt')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realize_budget_returns');
    }
}
