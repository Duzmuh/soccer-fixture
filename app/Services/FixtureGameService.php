<?php

namespace App\Services;

use App\Models\FixtureGame;

class FixtureGameService
{
	public function create($fixture_week_id,$status){

		$data = new FixtureGame();
		$data->fixture_week_id = $fixture_week_id;
        $data->status = $status;

		$data->save();
		return $data;

		}

	public function update($id, $status){

		$data = FixtureGame::find($id);
		$data->status = $status;

		$data->save();

		}
		public function resetAll(){

			FixtureGame::query()->update(['status' => 0]);
	
		}

	public function delete($id){

		$data= FixtureGame::find($id);
		$data->delete();

		}
}
