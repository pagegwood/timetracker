<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_team', function (Blueprint $table) {
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->integer('team_id')->unsigned()->index();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::drop('project_team');
    }
}
