<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\FixtureWeek;

class FixtureWeekRepository extends AbstractRepository
{

	protected function getDefaultModel(): string
	{
		return FixtureWeek::class;
	}


    public function getNextWeek()
	{
		$result = $this->defaultModel()
			->whereHas('fixtureGames', function ($q) {
				$q->where('status', 0);
			})
			->with([
				'fixtureGames' => function ($q) {
					$q->where('status', 0)
						->with([
							'gameScores.team'
                        ]);
				}
			])
			->orderBy("week_of_fixture", "ASC")
			->first();
		return $result;
	}

    public function getAllWeeks()
	{
		$result = $this->defaultModel()
			->whereHas('fixtureGames', function ($q) {
				$q->where('status', 0);
			})
			->with([
				'fixtureGames' => function ($q) {
					$q->where('status', 0)
						->with([
							'gameScores'
                        ]);
				}
			])
			->get();
		return $result;
	}

	public function getFixture()
	{
		$result = $this->defaultModel()
		->with([
			'fixtureGames.gameScores.team'
		])
			->get();
		return $result;
	}
}
