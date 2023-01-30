<?php

namespace App\Http\Livewire;

use App\Models\GameToken;
use App\Models\User;
use Livewire\Component;

class RegistrationLink extends Component
{
    public string $userName;
    public string $phoneNumber;

    protected ?GameToken $token = null;

    protected $rules = [
        'userName' => 'required|string|min:6',
        'phoneNumber' => 'required|string|min:9',
    ];

    protected $messages = [
        'userName.required' => 'The User Name cannot be empty.',
        'phoneNumber.required' => 'The Phone number cannot be empty.',
    ];

    public function register()
    {
        $request = $this->validate();

        /**
         * @var User $user
         */
        $user = User::query()->firstOrCreate(['user_name' => $request['userName'], 'phone' => $request['phoneNumber']]);
        $this->token = $user->getNewToken();
    }

    public function render()
    {
        $data = [
            'registered' => false,
        ];

        if ($this->token) {
            $data = [
                'registered' => true,
                'link' => $this->token->link
            ];
        }

        return view('livewire.registration-link', $data);
    }
}
