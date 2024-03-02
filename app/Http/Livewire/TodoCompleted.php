<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TodoCompleted extends Component
{
    public $tasks, $task_id, $title;

    protected $listeners = [
        'markDone' => 'mount',
        'unmarkDone' => 'mount',
        'completedTaskDelete' => 'render',
        'statusUpdate' => 'render',
        'taskUpdate' => 'mount',
    ];

    public function mount()
    {
        $this->tasks = Task::latest()->where('user_id', Auth::user()->id)->where('status', 'completed')->get();
    }

    public function unmark_as_done($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'pending';
        $task->save();

        $this->emit('unmarkDone');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        session()->flash('message', 'Task Deleted!');

        $this->emit('completedTaskDelete');
    }

    public function render()
    {
        return view('livewire.todo-completed');
    }
}
