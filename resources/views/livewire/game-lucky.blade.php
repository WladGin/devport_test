<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 mb-3">Желаете попытать удачу?!</h1>
            <p class="col-lg-10 fs-4">Правила очень просты! Рандомное число от 1 до 1000. Если выпадает четное число -
                Вы победитель!</p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <div class="p-4 p-md-5 border rounded-3 bg-light">
                <div class=" mb-3" @if($currentGame !== null)wire:key="{{ $currentGame->id }}" @endif>
                    <p class="col-lg-10 fs-4">
                        @if($currentGame === null)

                            @if($lastGame !== null)
                                Ваша предыдущая игра:
                                Число: {{$lastGame->total}}
                                Результат: @if($lastGame->isWin) WIN! @else LOSE @endif
                                Ваш Выигрыш: {{$lastGame->winSum}}
                            @else Вы ещё не ссыграли ни одной игры. Время нажать на кнопку "Я чувствую удачу!"
                            @endif
                        @else
                            Число: {{$currentGame->total}}
                            Результат: @if($currentGame->isWin) WIN! @else LOSE @endif
                            Ваш Выигрыш: {{$currentGame->winSum}}
                        @endif
                    </p>

                </div>

                <button class="w-100 btn btn-lg btn-primary justify-center" wire:click="generateNumber" type="submit">Я
                    чувстую удачу!
                </button>
                <hr class="my-5">
                <small class="text-muted">Пусть удача всегда будет с Вами!</small>
            </div>
        </div>
    </div>
</div>

