<?php

declare(strict_types=1);

namespace App\Http\Helper;


class FixtureWeekHelper
{

    public function fixtureModel()
    {
        return [
            '1' => [
                '1' => [
                    '0' => "3",
                    '1' => "0"
                ],
                '2' => [
                    '0' => "1",
                    '1' => "2"
                ],
            ],
            '2' => [
                '1' => [
                    '0' => "1",
                    '1' => "3"
                ],
                '2' => [
                    '0' => "2",
                    '1' => "0"
                ],
            ],
            '3' => [
                '1' => [
                    '0' => "3",
                    '1' => "2"
                ],
                '2' => [
                    '0' => "0",
                    '1' => "1"
                ],
            ],
            '4' => [
                '1' => [
                    '0' => "0",
                    '1' => "3"
                ],
                '2' => [
                    '0' => "2",
                    '1' => "1"
                ],
            ],
            '5' => [
                '1' => [
                    '0' => "3",
                    '1' => "1"
                ],
                '2' => [
                    '0' => "0",
                    '1' => "2"
                ],
            ],
            '6' => [
                '1' => [
                    '0' => "2",
                    '1' => "3"
                ],
                '2' => [
                    '0' => "1",
                    '1' => "0"
                ],
            ]
        ];
    }


    public function calculateResults($fixture)
    {
        $result = [
            '1' => ['pts' => 0,'won' => 0,'drawn' => 0,'loss' => 0,'gf' => 0,'ga' => 0],
            '2' => ['pts' => 0,'won' => 0,'drawn' => 0,'loss' => 0,'gf' => 0,'ga' => 0],
            '3' => ['pts' => 0,'won' => 0,'drawn' => 0,'loss' => 0,'gf' => 0,'ga' => 0],
            '4' => ['pts' => 0,'won' => 0,'drawn' => 0,'loss' => 0,'gf' => 0,'ga' => 0]
        ];

        foreach($fixture as $week)
        {
            foreach(data_get($week,'fixtureGames') as $game)
            {
                if(data_get($game,'status')==1)
                {
                    if(data_get($game,'gameScores.0.goal') > data_get($game,'gameScores.1.goal'))
                    {
                        
                        $result[data_get($game,'gameScores.0.team_id')]['pts'] +=3;
                        $result[data_get($game,'gameScores.0.team_id')]['won'] +=1;
                        $result[data_get($game,'gameScores.0.team_id')]['gf'] +=data_get($game,'gameScores.0.goal');
                        $result[data_get($game,'gameScores.0.team_id')]['ga'] +=data_get($game,'gameScores.1.goal');

                        $result[data_get($game,'gameScores.1.team_id')]['loss'] +=1;
                        $result[data_get($game,'gameScores.1.team_id')]['gf'] +=data_get($game,'gameScores.1.goal');
                        $result[data_get($game,'gameScores.1.team_id')]['ga'] +=data_get($game,'gameScores.0.goal');
                    }
                    else if(data_get($game,'gameScores.0.goal') < data_get($game,'gameScores.1.goal'))
                    {
                        $result[data_get($game,'gameScores.1.team_id')]['pts'] +=3;
                        $result[data_get($game,'gameScores.1.team_id')]['won'] +=1;
                        $result[data_get($game,'gameScores.1.team_id')]['gf'] +=data_get($game,'gameScores.1.goal');
                        $result[data_get($game,'gameScores.1.team_id')]['ga'] +=data_get($game,'gameScores.0.goal');

                        $result[data_get($game,'gameScores.0.team_id')]['loss'] +=1;
                        $result[data_get($game,'gameScores.0.team_id')]['gf'] +=data_get($game,'gameScores.0.goal');
                        $result[data_get($game,'gameScores.0.team_id')]['ga'] +=data_get($game,'gameScores.1.goal');
                    }
                    else{

                        $result[data_get($game,'gameScores.1.team_id')]['pts'] +=1;
                        $result[data_get($game,'gameScores.1.team_id')]['drawn'] +=1;
                        $result[data_get($game,'gameScores.1.team_id')]['gf'] +=data_get($game,'gameScores.1.goal');
                        $result[data_get($game,'gameScores.1.team_id')]['ga'] +=data_get($game,'gameScores.0.goal');

                        $result[data_get($game,'gameScores.0.team_id')]['pts'] +=1;
                        $result[data_get($game,'gameScores.0.team_id')]['drawn'] +=1;
                        $result[data_get($game,'gameScores.0.team_id')]['gf'] +=data_get($game,'gameScores.0.goal');
                        $result[data_get($game,'gameScores.0.team_id')]['ga'] +=data_get($game,'gameScores.1.goal');
                    }
                }

            }
        }
        return $result;
    }

    public function calcProdictions($data)
    {
        $result =[];
        $total = 0;
        foreach($data as $teamKey => $team)
        {
            $result[$teamKey] = data_get($team,'pts')+(data_get($team,'gf')-data_get($team,'ga'));
            $total += $result[$teamKey];
        }
        foreach($data as $teamKey => $team)
        {
            $result[$teamKey] = ($result[$teamKey]/$total)*100;
        }
        
        return $result;
    }

}
