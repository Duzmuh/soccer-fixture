<?php

namespace App\Services;

use App\Models\FixtureWeek;

class FixtureWeekService
{
	public function create($week_of_fixture){

		$data = new FixtureWeek();
		$data->week_of_fixture = $week_of_fixture;

		$data->save();
		return $data;

		}

	public function delete($id){

		$data= FixtureWeek::find($id);
		$data->delete();

		}
}
