<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskCreate extends Component
{
    public $nome;
    public $prioridade = 2;
    public $data;

    protected $rules = [
        'nome' => 'required|min:1|max:255',
        'prioridade' => 'required|digits_between:1,3',
        'data' => 'nullable|date|after_or_equal:now',
    ];

    public function store(){
        $this->validate();
        Task::create([
            'name' => $this->nome,
            'priority' => $this->prioridade,
            'date' => $this->data,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('tasks.index');
    }

    public function render()
    {
        return view('livewire.task-create');
    }
}
