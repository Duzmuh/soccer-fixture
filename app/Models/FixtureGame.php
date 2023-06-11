<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FixtureGame extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'f__fixture_games';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    /**
     * @var array
     */
    protected $fillable = ['fixture_week_id','status','created_at', 'updated_at', 'deleted_at'];

    public function fixtureWeek()
    {
        return $this->hasOne(FixtureWeek::class, "id", "fixture_week_id");
    }
    public function gameScores()
    {
        return $this->hasMany(GameScore::class, "fixture_game_id", "id");
    }

}
