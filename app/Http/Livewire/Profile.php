<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $user, $id_user, $name, $username, $email, $password, $show_password = false;
    public $count = 0;

    protected $listeners = [
        'userUpdate' => 'mount',
    ];

    public function mount()
    {
        $this->user = User::where('id', Auth::user()->id)->get();
        // dd($this->user);
    }

    public function edit(User $user)
    {
        $this->id_user = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|string',
            'username' => 'required|min:3|string',
        ]);

        $user = User::findOrFail($this->id_user);
        $user->update([
            'name' => $this->name,
            'username' => $this->username,
        ]);

        $this->emit('userUpdate');
    }

    public function render()
    {
        return view('livewire.profile')->extends('layouts.app')->section('content');
    }
}
