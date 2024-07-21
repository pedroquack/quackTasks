<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskEdit extends Component
{
    public Task $task;
    public $name;
    public $priority;
    public $date;

    protected $rules = [
        'name' => 'required|min:1|max:255',
        'priority' => 'required|digits_between:1,3',
        'date' => 'nullable|date|after:now',
    ];

    public function update(){
        $this->authorize('user_task',$this->task);
        $this->validate();
        $this->task->name = $this->name;
        $this->task->priority = $this->priority;
        $this->task->date = $this->date;
        $this->task->save();
        return redirect()->route('tasks.index');
    }
    public function render()
    {
        $this->name = $this->task->name;
        if(isset($this->task->date)){
            $this->date = $this->task->date->format('Y-m-d H:i');
        }
        $this->priority = $this->task->priority;
        return view('livewire.task-edit');
    }
}
