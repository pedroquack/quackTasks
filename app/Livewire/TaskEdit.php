<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskEdit extends Component
{
    public Task $task;
    public $nome;
    public $prioridade;
    public $data;

    protected $rules = [
        'nome' => 'required|min:1|max:255',
        'prioridade' => 'required|digits_between:1,3',
        'data' => 'nullable|date|after_or_equal:now',
    ];

    public function update(){
        $this->authorize('user_task',$this->task);
        $this->validate();
        $this->task->name = $this->nome;
        $this->task->priority = $this->prioridade;
        $this->task->date = $this->data;
        $this->task->save();
        return redirect()->route('tasks.index');
    }
    public function render()
    {
        $this->nome = $this->task->name;
        $this->data = $this->task->date;
        $this->prioridade = $this->task->priority;
        return view('livewire.task-edit');
    }
}
