<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskList extends Component
{
    public $tasks;
    public $name;
    public $editTaskId;
    public $editTaskName;

    public function mount()
    {
        $this->tasks = Task::all();
    }

    public function addTask()
    {
        $this->validate(['name' => 'required']);

        Task::create(['name' => $this->name]);

        $this->tasks = Task::all();
        $this->name = '';
    }

    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        $this->editTaskId = $task->id;
        $this->editTaskName = $task->name;
    }

    public function updateTask()
    {
        $this->validate([
            'editTaskName' => 'required'
        ]);

        $task = Task::findOrFail($this->editTaskId);
        $task->name = $this->editTaskName;
        $task->save();

        $this->editTaskId = null;
        $this->editTaskName = '';

        $this->tasks = Task::all();
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        $this->tasks = Task::all();
    }

    public function render()
    {
        return view('livewire.task-list');
    }
}
