<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public $count = 0;

    public function increment() {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.profile')->extends('layouts.app')->section('content');
    }
}
