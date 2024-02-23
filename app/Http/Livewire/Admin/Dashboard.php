<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $users;
    public function render()
    {
        $this->users = User::orderBy('name', 'asc')->withCount('tasks')->get();

        return view('livewire.admin.dashboard')->extends('layouts.app')->section('content');
    }
}
