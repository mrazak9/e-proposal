<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDedicationProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dedication_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->string('research_group');
            $table->string('cluster_of_knowledge');
            $table->integer('type_of_skim');
            $table->string('location');
            $table->char('proposed_year',4);
            $table->char('length_of_activity');
            $table->integer('source_of_funds');
            $table->boolean('application_status')->default(0);
            $table->boolean('contract_status')->default(0);
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
        Schema::dropIfExists('dedication_proposals');
    }
}
