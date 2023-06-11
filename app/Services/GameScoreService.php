<?php

namespace App\Services;

use App\Models\GameScore;

class GameScoreService
{
	public function create($fixture_game_id,$team_id,$is_host,$goal){

		$data = new GameScore();
		$data->fixture_game_id = $fixture_game_id;
        $data->team_id = $team_id;
		$data->is_host = $is_host;
        $data->goal = $goal;

		$data->save();
		return $data;

		}

	public function update($id, $goal){

		$data = GameScore::find($id);
		$data->goal = $goal;

		$data->save();

		}

		public function resetAll(){

			GameScore::query()->update(['goal' => 0]);
	
		}

	public function delete($id){

		$data= GameScore::find($id);
		$data->delete();

		}
}
