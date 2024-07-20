<?php

namespace App\Livewire;

use App\Models\Task as TaskModel;
use Livewire\Component;

class Task extends Component
{
    public TaskModel $task;
    public $checkbox;

    public function check(){
        if(!isset($this->task)){
            http_response_code(404);
            abort(404);
        }
        $this->task->completed = $this->checkbox;
        $this->task->save();
    }

    public function render()
    {
        $this->checkbox = $this->task->completed;
        return view('livewire.task');
    }
}
