<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FixtureWeek extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'f__fixture_weeks';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    /**
     * @var array
     */
    protected $fillable = ['week_of_fixture','created_at', 'updated_at', 'deleted_at'];

    public function fixtureGames()
    {
        return $this->hasMany(FixtureGame::class, "fixture_week_id", "id");
    }

}
