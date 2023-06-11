<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameScore extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'f__game_scores';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    /**
     * @var array
     */
    protected $fillable = ['fixture_game_id','team_id','is_host','goal','created_at', 'updated_at', 'deleted_at'];

    public function fixtureGame()
    {
        return $this->hasOne(FixtureGame::class, "id", "fixture_game_id");
    }
    public function team()
    {
        return $this->hasOne(Team::class, "id", "team_id");
    }

}
