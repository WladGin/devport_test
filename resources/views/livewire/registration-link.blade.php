<div class="form-horizontal">
    <span class="heading">Регистрация</span>
    @if($registered)
        Супер, твоя ссылка - <a href="{{$link}}">туть</a>
    @else
        <div class="form-group">
            <input type="text" wire:model="userName" class="form-control" name="userName" placeholder="UserName" required>
            <i class="fa fa-user"></i>
        </div>
        <div class="form-group help">
            <input type="text" class="form-control" wire:model="phoneNumber" name="phoneNumber" placeholder="Phone number" required>
            <i class="fa fa-phone"></i>
        </div>
        @if ($errors->any())
            <div class="form-group">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="form-group">
            <button type="button" class="btn btn-default" wire:click="register">Сгенерировать ссылку</button>
        </div>
    @endif
</div>
