<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
    }
    public function show()
    {
    }
    public function edit()
    {
    }
    public function update()
    {
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('user.todo.home')->with('message', 'Delete Successfully!');
    }
}
