<?php

namespace App\Http\Livewire;

use App\Models\GameToken;
use App\Models\User;
use Livewire\Component;

class GenerateLink extends Component
{
    public User $user;
    public string $message;
    public ?GameToken $newGameToken = null;

    public function mount(GameToken $gameToken)
    {
        $this->user = User::query()->findOrFail($gameToken->user_id);
    }

    public function generateLink()
    {
        $this->newGameToken = ($this->user->getNewToken());
        $this->message = 'Ссылка успешно сгенерировалась!';
    }

    public function deactivateLink()
    {
        $this->message = 'Сначала сгенерируйте новую ссылку!';

        if ($this->newGameToken !== null){
            $this->newGameToken->is_active = false;
            $this->newGameToken->save();

            $this->message = 'Ссылка успешно деактивирована!';
        }
    }

    public function render()
    {
        return view('livewire.generate-link');
    }
}
