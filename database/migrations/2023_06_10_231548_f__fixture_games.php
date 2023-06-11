<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FFixtureGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f__fixture_games', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->bigInteger('fixture_week_id')->comment('fixture week ID');
            $table->tinyInteger('status')->comment('game status');
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
