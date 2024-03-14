<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $users, $name, $username, $email, $password, $show_password = false;
    public $count = 0;

    public function mount()
    {
        $this->users = Auth::user();
    }

    public function rules()
    {
    }

    public function update()
    {
    }

    public function render()
    {
        return view('livewire.profile')->extends('layouts.app')->section('content');
    }
}
