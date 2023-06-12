<?php
namespace App\Http\Controllers;

use App\Repository\TeamRepository;
use App\Http\Helper\FixtureWeekHelper;
use App\Services\FixtureGameService;
use App\Services\FixtureWeekService;
use App\Services\GameScoreService;

use App\Repository\FixtureWeekRepository;
use App\Repository\FixtureGameRepository;

class SoccerController extends Controller
{

    public function dashboardPage (
        TeamRepository $teamRepository,
        FixtureWeekRepository $fixtureWeekRepository,
        FixtureWeekHelper $fixtureWeekHelper
    )
    {
        $data = [];

        $teams = $teamRepository->getAllTeams();
        $fixture = $fixtureWeekRepository->getFixture();
        $nextWeek = $fixtureWeekRepository->getNextWeek();

        $results = $fixtureWeekHelper->calculateResults($fixture);
        $prodictions = $fixtureWeekHelper->calcProdictions($results);
        

        $data['teams'] = $teams->toArray();
        $data['fixture'] = $fixture->toArray();
        $data['nextWeek'] = $nextWeek->toArray();
        
        $data['results'] = $results;
        $data['prodictions'] = $prodictions;

        return view('dashboard',$data);
    }

    public function generateFixture(
        FixtureWeekHelper $fixtureWeekHelper,
        TeamRepository $teamRepository,
        FixtureWeekService $fixtureWeekService,
        FixtureGameService $fixtureGameService,
        GameScoreService $gameScoreService
    )
    {
        $teams = $teamRepository->getAllTeams();
        $fixtureModel = $fixtureWeekHelper->fixtureModel();

       
        foreach ($fixtureModel as $weekKey => $week)
        {
            $weekData = $fixtureWeekService->create($weekKey);

            foreach ($week as $gameKey => $game)
            {
                $gameData = $fixtureGameService->create(data_get($weekData,'id'),0);

                foreach ($game as $scoreKey => $score)
                {
                    $scoreData = $gameScoreService->create(data_get($gameData,'id'),$teams[$score]['id'],$scoreKey,0);
                }
            }
            
        }
        return true;
    }

    public function playNextWeek(
        FixtureWeekRepository $fixtureWeekRepository,
        GameScoreService $gameScoreService,
        FixtureGameService $fixtureGameService
    )
    {
       $data = $fixtureWeekRepository->getNextWeek()->toArray();

       foreach (data_get($data,'fixture_games') as $game)
       {

        foreach(data_get($game,'game_scores') as $score)
        {
            $goal = rand(0,3);
            $gameScoreService->update(data_get($score,'id'),$goal);
        }

        $fixtureGameService->update(data_get($game,'id'),1);
            
       }
    }

    public function playAllWeeks(
        FixtureWeekRepository $fixtureWeekRepository,
        GameScoreService $gameScoreService,
        FixtureGameService $fixtureGameService
    )
    {
       $all = $fixtureWeekRepository->getAllWeeks()->toArray();
       
       foreach ($all as $data)
       {
            foreach (data_get($data,'fixture_games') as $game)
            {
                foreach(data_get($game,'game_scores') as $score)
                {
                    $goal = rand(0,3);
                    $gameScoreService->update(data_get($score,'id'),$goal);
                }

                $fixtureGameService->update(data_get($game,'id'),1);
                    
            }
        }

    }

    public function resetResults(
        GameScoreService $gameScoreService,
        FixtureGameService $fixtureGameService
    )
    {
        $gameScoreService->resetAll();
        $fixtureGameService->resetAll();
    }

}

?>

