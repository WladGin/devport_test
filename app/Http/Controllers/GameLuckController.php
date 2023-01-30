<?php

namespace App\Http\Controllers;

use App\Models\GameToken;
use Illuminate\Http\Request;

class GameLuckController extends Controller
{
    public function index(string $token)
    {
        $gameToken = GameToken::query()->where('token', $token)->first();

        return view('game.layout')->with('gameToken', $gameToken);
    }
}
