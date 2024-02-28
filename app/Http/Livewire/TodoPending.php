<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TodoPending extends Component
{
    public $tasks, $task_id, $title, $status;

    protected $listeners = [
        'unmarkDone' => 'render',
        'pendingTaskDelete' => 'render',
        'taskStore' => 'render',
        'taskUpdate' => 'render',
    ];

    public function mark_as_done($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'completed';
        $task->save();
        $this->emit('markDone');
    }

    public function edit(Task $task)
    {
        $this->id = $task->id;
        $this->title = $task->title;
        $this->status = $task->status;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:3|string'
        ]);

        $task = Task::where('id', $this->task_id);
        $task->update([
            'title' => $this->title
        ]);

        // $this->reset('title');

        $this->emit('taskUpdate');
    }

    public function delete($id)
    {
        dd('jalan');
        $task = Task::findOrFail($id);
        $task->delete();
        session()->flash('message', 'Task Deleted!');
        $this->emit('pendingTaskDelete');
    }

    public function render()
    {
        // $this->tasks_pending = Task::latest()->where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        return view('livewire.todo-pending', [
            'tasks' => $this->tasks = Task::latest()->where('user_id', Auth::user()->id)->where('status', 'pending')->get()
        ]);
    }
}
