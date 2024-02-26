<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Todo extends Component
{
    public $tasks, $task_id, $title, $tasks_pending, $tasks_completed;

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
    }

    public function mark_as_done($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'completed';
        $task->save();
    }

    public function delete_confirmation($id)
    {
        $this->task_id = $id;
    }

    public function delete($id)
    {
        // $id = $this->task_id;
        // dd($id);
        $task = Task::findOrFail($id);
        $task->delete();
        session()->flash('message', 'Task Deleted!');
    }

    public function render()
    {
        $this->tasks = Task::latest()->where('user_id', '=', Auth::user()->id)->get();
        $this->tasks_pending = Task::latest()->where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        $this->tasks_completed = Task::latest()->where('user_id', Auth::user()->id)->where('status', 'completed')->get();
        return view('livewire.todo')->extends('layouts.app')->section('content');
    }
}
