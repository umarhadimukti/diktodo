<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Todo extends Component
{
    public $task_id, $title, $date;

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:40',
            'date' => 'required|date',
        ];
    }

    public function store()
    {
        $this->validate();

        // jika $this->date null, return null. kalo ada isinya, return $this->date
        $due_date = $this->date ?? null;

        if ($this->title != '') {
            Task::create([
                'user_id' => Auth::user()->id,
                'title' => $this->title,
                'status' => 'pending',
                'due_at' => $due_date,
            ]);
        }

        $this->reset('title');
        $this->reset('date');

        session()->flash('message', 'Task berhasil di tambah!');

        // trigger ke listener taskStore
        $this->emit('taskStore');
    }

    public function render()
    {
        return view('livewire.todo')->extends('layouts.app')->section('content');
    }
}
