<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Task extends Component
{
    public $task;
    public $completed;
    public $expirationTime;
    public $categories;

    public $taskDate;
    public $taskHour;
    public $taskMinute;

    //Update
    public $newName;
    public $newCategory_id;
    public $newPriority;
    public $newDate;
    public $newDate_hour;
    public $newDate_min;

    protected $rules = [
        'name' => 'required|max:255|',
    ];
    public function mount($task){
        $this->task = $task;
        $this->completed = $task->completed;
    }
    public function completeTask(){
        $this->task->completed = $this->completed;
        $this->task->save();
    }
    public function editTask(Task $task){
        $this->newName = $task->name;
        $task = $this->validate();
        $task->name = $this->newName;
        $task->priority = $this->newPriority;
        if (isset($this->newCategory_id)) {
            $task->category_id = $this->newCategory_id;
        }
        if (isset($this->newDate)) {
            $date_sec = '00';
            $string = $this->newDate . ' ' . $this->newDate_hour . ':' . $this->newDate_min . ':' . $date_sec;
            $timestamp = date('Y-m-d H:i:s', strtotime($string));
            $task->date = $timestamp;
        };
        $task->save();
        return redirect()->route('tasks');
    }
    public function render()
    {
        Carbon::setLocale('pt_BR');
        if(isset($this->task->date)){
            $dateString = date_create_from_format('Y-m-d H:i:s',$this->task->date);
            $this->taskDate = $dateString->format('Y-m-d');
            $this->taskHour = $dateString->format('H');
            $this->taskMinute = $dateString->format('i');
        }
        $this->expirationTime = Carbon::parse($this->task->date)->diffForHumans(now(), ['syntax' => Carbon::DIFF_RELATIVE_TO_NOW]);
        return view('livewire.task');
    }
}
