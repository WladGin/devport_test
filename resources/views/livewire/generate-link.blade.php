<div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">Сгенерировать/деактивировать новую ссылку</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Здесь вы можете сгенерировать дополнительную, уникальную ссылку</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-4">
            <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" wire:click="generateLink">Сгенерировать ссылку</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4" wire:click="deactivateLink">Деактивировать ссылку</button>
        </div>
    </div>
    <div class="overflow-hidden" style="max-height: 30vh;">
        <div class="container px-5">
            @if($message)
                <p class="lead mb-4 @if($newGameToken !== null && $newGameToken->is_active) text-success @else text-danger @endif">{{$message}}</p>
            @endif

            @if($newGameToken)
                    <a href="{{$newGameToken->link}}">Новая ссылка</a>
                @endif
        </div>
    </div>
</div>
