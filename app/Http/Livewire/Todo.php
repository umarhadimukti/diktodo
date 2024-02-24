<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Todo extends Component
{
    public $tasks, $title, $tasks_pending, $tasks_completed;

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:20'
        ];
    }

    public function store()
    {
        $this->validate();

        Task::create([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'status' => 'pending',
        ]);

        return session()->flash('message', 'Task berhasil di tambah!');
    }

    public function render()
    {
        $this->tasks = Task::latest()->where('user_id', '=', Auth::user()->id)->get();
        return view('livewire.todo')->extends('layouts.app')->section('content');
    }
}
