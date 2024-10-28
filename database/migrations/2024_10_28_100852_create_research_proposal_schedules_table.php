<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchProposalSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_proposal_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_proposals_id')->unsigned();
            $table->char('year_at',2);
            $table->text('event_name');
            $table->boolean('1')->nullable();
            $table->boolean('2')->nullable();
            $table->boolean('3')->nullable();
            $table->boolean('4')->nullable();
            $table->boolean('5')->nullable();
            $table->boolean('6')->nullable();
            $table->boolean('7')->nullable();
            $table->boolean('8')->nullable();
            $table->boolean('9')->nullable();
            $table->boolean('10')->nullable();
            $table->boolean('11')->nullable();
            $table->boolean('12')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_proposal_schedules');
    }
}
