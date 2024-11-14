<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDedicationProposalsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dedication_proposal_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dedication_proposals_id')->unsigned();
            $table->string('name');
            $table->char('identity_number',25);
            $table->string('affiliation');
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
        Schema::dropIfExists('dedication_proposal_members');
    }
}
