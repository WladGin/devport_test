<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    @vite('resources/css/game_layout.css')
    @livewireStyles
    <title>Lucky Games</title>
</head>
<body>
<main>
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">Lucky Games</h1>
    </div>

    <div class="b-example-divider"></div>

    @livewire('generate-link', ['gameToken' => $gameToken])

    <div class="b-example-divider"></div>

    @livewire('game-lucky', ['gameToken' => $gameToken])

    <div class="b-example-divider"></div>

    @livewire('game-history', ['gameToken' => $gameToken])

    <div class="b-example-divider"></div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@livewireScripts
</body>
</html>

<body>


</body>
