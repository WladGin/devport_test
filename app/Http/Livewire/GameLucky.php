<?php

namespace App\Http\Livewire;

use App\Models\GameHistory as GameHistoryModel;
use App\Models\GameToken;
use Livewire\Component;

class GameLucky extends Component
{
    public GameToken $gameToken;
    public ?GameHistoryModel $currentGame = null;
    public ?GameHistoryModel $lastGame = null;

    public function mount(GameToken $gameToken)
    {
        $this->gameToken = $gameToken;
        $this->lastGame = GameHistoryModel::query()
            ->where('user_id', $this->gameToken->user_id)
            ->latest()
            ->first();
    }

    public function generateNumber()
    {
        $this->currentGame = GameHistoryModel::query()->create([
            'total' => rand(0, 1000),
            'user_id' => $this->gameToken->user_id,
        ]);
    }

    public function render()
    {
        return view('livewire.game-lucky');
    }
}
