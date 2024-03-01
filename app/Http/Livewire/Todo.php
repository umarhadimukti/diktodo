<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Todo extends Component
{
    public $task_id, $title, $date;

    protected $listeners = [
        'completedTaskDelete' => 'render'
    ];

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:40',
        ];
    }

    public function store()
    {
        $this->validate();

        if ($this->title != '') {
            Task::create([
                'user_id' => Auth::user()->id,
                'title' => $this->title,
                'status' => 'pending',
            ]);
        }

        $this->reset('title');

        session()->flash('message', 'Task berhasil di tambah!');

        // trigger ke listener taskStore
        $this->emit('taskStore');
    }

    public function render()
    {
        return view('livewire.todo')->extends('layouts.app')->section('content');
    }
}
