<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImplementationDateToDedicationProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dedication_proposals', function (Blueprint $table) {
            $table->date('implementation_date');
            $table->char('implementation_year',4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dedication_proposals', function (Blueprint $table) {
            //
        });
    }
}
