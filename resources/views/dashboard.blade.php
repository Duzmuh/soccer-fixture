<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
@php
        //dd($fixture);
@endphp
    <h3>Fixture</h3>
    <hr>
    <div class="row">
        @foreach ($fixture as $weekKey => $week)
        <div class="col-2">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{data_get($week,'week_of_fixture')}}. Week</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                    @foreach (data_get($week,'fixture_games') as $game)
                    <tr class="isplayed{{data_get($game,'status')}}">
                        <td>{{data_get($game,'game_scores.0.team.name')}} ({{data_get($game,'game_scores.0.goal')}})</td>
                        <td>-</td>
                        <td>({{data_get($game,'game_scores.1.goal')}}) {{data_get($game,'game_scores.1.team.name')}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @endforeach

    </div>

    
    <h3>Simulation</h3>
    <hr>
    <div class="row">
        <div class="col-6">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Team</th>
                    <th scope="col">Pts</th>
                    <th scope="col">Won</th>
                    <th scope="col">Drawn</th>
                    <th scope="col">Lost</th>
                    <th scope="col">G. Dif.</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <th scope="row">{{data_get($team,'name')}}</th>
                        <td>{{$results[data_get($team,'id')]['pts']}}</td>
                        <td>{{$results[data_get($team,'id')]['won']}}</td>
                        <td>{{$results[data_get($team,'id')]['drawn']}}</td>
                        <td>{{$results[data_get($team,'id')]['loss']}}</td>
                        <td>{{$results[data_get($team,'id')]['gf']-$results[data_get($team,'id')]['ga']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if($nextWeek)
        <div class="col-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{data_get($nextWeek,'week_of_fixture')}}. Week</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach (data_get($nextWeek,'fixture_games') as $game)
                    <tr class="isplayed{{data_get($game,'status')}}">
                        <td>{{data_get($game,'game_scores.0.team.name')}}</td>
                        <td>-</td>
                        <td>{{data_get($game,'game_scores.1.team.name')}}</td>
                    </tr>
                    @endforeach
                </tr>
                
                </tbody>
            </table>
        </div>
        @endif

        <div class="col-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Champ. Prodictions</th>
                    <th scope="col">%</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                    <tr>
                        <td>{{data_get($team,'name')}}</td>
                        <td>{{round($prodictions[data_get($team,'id')])}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

</div>



<style>
.isplayed1{
    background: #21b32e;
}
.isplayed0{
    background: #ffca00;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>