<?php

namespace App\Livewire;

use App\Models\Task as TaskModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Task extends Component
{
    use AuthorizesRequests;

    public TaskModel $task;
    public $checkbox;

    public function check(){
        $this->authorize('user_task',$this->task);
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
