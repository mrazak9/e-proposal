<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchProposalRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_proposal_revisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_proposals_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('revision');
            $table->boolean('isDone');
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
        Schema::dropIfExists('research_proposal_revisions');
    }
}
