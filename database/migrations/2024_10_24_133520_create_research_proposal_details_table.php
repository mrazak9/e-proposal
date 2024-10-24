<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchProposalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_proposal_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_proposals_id')->unsigned();
            $table->string('keyword');
            $table->text('background');
            $table->text('state_of_the_art');
            $table->text('road_map_research');
            $table->text('method_and_design');
            $table->text('references');
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
        Schema::dropIfExists('research_proposal_details');
    }
}
