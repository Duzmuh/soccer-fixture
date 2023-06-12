<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\FixtureGame;

class FixtureGameRepository extends AbstractRepository
{

	protected function getDefaultModel(): string
	{
		return FixtureGame::class;
	}

	public function getGames()
	{
		$result = $this->defaultModel()
		->with([
			'gameScores'
		])
			->get();
		return $result;
	}
}
