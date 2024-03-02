<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TodoPending extends Component
{
    public $tasks, $task_id, $title, $status, $date;

    protected $listeners = [
        'markDone' => 'mount',
        'unmarkDone' => 'mount',
        'pendingTaskDelete' => 'render',
        'taskStore' => 'mount',
        'taskUpdate' => 'mount',
        'dateFilter' => 'render',
    ];

    public function mount()
    {
        $this->tasks = Task::latest()->where('user_id', Auth::user()->id)->where('status', 'pending')->orderBy('id', 'asc')->get();
    }

    public function checkDueTime() {
        
    }

    public function filter_date()
    {
        if ($this->date) {
            $this->tasks = Task::where('user_id', Auth::user()->id)->whereDate('created_at', $this->date)->orderBy('created_at', 'asc')->get();
        }
        $this->emit('dateFilter');
    }

    public function mark_as_done($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'completed';
        $task->save();
        $this->emit('markDone');
    }

    public function edit(Task $task)
    {
        $this->task_id = $task->id;
        $this->title = $task->title;
        $this->status = $task->status;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:3|string',
        ]);

        $task = Task::where('id', $this->task_id);
        $task->update([
            'title' => $this->title,
            'status' => $this->status,
        ]);

        // $this->reset('title');

        $this->emit('taskUpdate');
    }

    public function update_status()
    {
        $this->status = 'completed';
        $this->emit('statusUpdate');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        session()->flash('message', 'Task Deleted!');
        $this->emit('pendingTaskDelete');
    }

    public function render()
    {
        // $this->tasks_pending = Task::latest()->where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        return view('livewire.todo-pending');
    }
}
