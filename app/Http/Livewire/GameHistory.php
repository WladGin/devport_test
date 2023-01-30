<?php

namespace App\Http\Livewire;

use App\Models\GameHistory as GameHistoryModel;
use App\Models\GameToken;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class GameHistory extends Component
{
    public GameToken $gameToken;
    public Collection $gamingHistory;
    protected int $count = 3;

    public function mount(GameToken $gameToken)
    {
        $this->gameToken = $gameToken;
        $this->gamingHistory($this->count);
    }

    public function gamingHistory(int $count)
    {
        $this->gamingHistory = GameHistoryModel::query()
            ->where('user_id', $this->gameToken->user_id)
            ->latest()
            ->limit($count)
            ->get();
    }

    public function render()
    {
        return view('livewire.game-history');
    }
}
