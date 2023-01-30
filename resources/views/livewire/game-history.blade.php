<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            @if($gamingHistory->isNotEmpty())
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Win/Lose</th>
                        <th scope="col">Total</th>
                        <th scope="col">Money</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($gamingHistory as $key => $game)
                        <tr class="@if($game->isWin) table-success @else table-danger @endif">
                            <th scope="row">{{$key + 1}}</th>
                            @if($game->isWin)
                                <td>Win</td>
                            @else
                                <td>Lose</td>
                            @endif
                            <td>{{$game->total}}</td>
                            <td>{{$game->winSum}}</td>
                            <td>{{$game->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="lead">У Вас нет ни одной игры!</p>
            @endif
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">Последние игры</h1>
            <p class="lead">Здесь ваши результаты последних 3х игр</p>
            <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" wire:click="gamingHistory(3)">Обновить историю</button>
        </div>
    </div>
</div>
