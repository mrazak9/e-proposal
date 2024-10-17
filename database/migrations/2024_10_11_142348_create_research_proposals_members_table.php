<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchProposalsMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_proposals_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_proposals_id')->unsigned();
            $table->string('name');
            $table->char('identity_number',25);
            $table->string('affiliation');
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
        Schema::dropIfExists('research_proposals_members');
    }
}
