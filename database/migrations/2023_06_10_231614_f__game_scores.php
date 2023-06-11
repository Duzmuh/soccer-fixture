<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FGameScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f__game_scores', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->bigInteger('fixture_game_id')->comment('fixture game ID');
            $table->bigInteger('team_id')->comment('team ID');
            $table->tinyInteger('is_host')->comment('is host');
            $table->tinyInteger('goal')->comment('goal');
            $table->timestamps();
            $table->softDeletes();
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
