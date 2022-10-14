<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpjTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lpj', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proposal_id')->unsigned();
            $table->text('keberhasilan');
            $table->text('kendala');
            $table->text('notes');
            $table->string('link_lampiran');
            $table->string('link_dokumentasi_kegiatan');
            $table->timestamps();

            $table->foreign('proposal_id')
                ->references('id')
                ->on('proposal')
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
        Schema::dropIfExists('lpj');
    }
}
