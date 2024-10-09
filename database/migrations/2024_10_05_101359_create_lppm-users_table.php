<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLppmUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lppm_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->boolean('status');
            $table->string('nidn',25);
            $table->string('affiliation');
            $table->integer('academic_grade_id')->unsigned();
            $table->integer('group_of_work_id')->unsigned();
            $table->string('nik',16);
            $table->text('google_scholar_url');
            $table->string('scopus_id')->nullable();
            $table->string('department_id')->nullable();
            $table->string('handphone',14)->nullable();
            $table->string('place_of_birth');
            $table->date('date_of_birth');
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
        //
    }
}
