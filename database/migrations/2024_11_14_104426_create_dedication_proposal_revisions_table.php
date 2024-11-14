<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDedicationProposalRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dedication_proposal_revisions', function (Blueprint $table) {
            $table->integer('dedication_proposals_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('revision');
            $table->boolean('isDone');
            $table->timestamps();

            $table->foreign('dedication_proposals_id')
                ->references('id')
                ->on('dedication_proposals')
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
        Schema::dropIfExists('dedication_proposal_revisions');
    }
}
