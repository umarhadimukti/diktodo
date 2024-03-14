<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Component
{
    public $user, $id_user, $name, $username, $email, $password, $current_password, $error_password, $new_password, $show_password = false;
    public $count = 0;

    protected $listeners = [
        'userUpdate' => 'mount',
        'passwordUpdate' => 'mount',
    ];

    public function mount()
    {
        $this->user = User::where('id', Auth::user()->id)->get();
        // dd($this->user);
    }

    public function check_current_password()
    {
        if (Hash::make($this->current_password) != $this->user[0]->password) {
            $this->error_password = 'Password tidak cocok.';
        }
    }

    public function update_password()
    {
        $user = User::findOrFail($this->user[0]->id);
        $user->update(['password' => $this->new_password]);
        $this->emit('passwordUpdate');
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
