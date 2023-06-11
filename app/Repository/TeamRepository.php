<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Team;

class TeamRepository extends AbstractRepository
{

	protected function getDefaultModel(): string
	{
		return Team::class;
	}

	public function getAllTeams()
	{
		$result = $this->defaultModel()->get();

        return $result;
	}
}
