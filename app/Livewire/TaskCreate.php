<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskCreate extends Component
{
    public $name;
    public $priority = 2;
    public $date;

    protected $rules = [
        'name' => 'required|min:1|max:255',
        'priority' => 'required|digits_between:1,3',
        'date' => 'nullable|date|after:now',
    ];

    public function store(){
        $this->validate();
        Task::create([
            'name' => $this->name,
            'priority' => $this->priority,
            'date' => $this->date,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('tasks.index');
    }

    public function render()
    {
        return view('livewire.task-create');
    }
}
