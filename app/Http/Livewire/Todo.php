<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class Todo extends Component
{
    public $tasks, $tasks_pending, $tasks_completed;
    public function render()
    {
        $this->tasks = Task::latest()->get();
        return view('livewire.todo')->extends('layouts.app')->section('content');
    }
}
