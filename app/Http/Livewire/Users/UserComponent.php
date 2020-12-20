<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class UserComponent extends Component
{
    public $users;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users.user-component');
    }
}
