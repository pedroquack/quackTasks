<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use App\Models\Category;

class TaskCreate extends Component
{
    public $name;
    public $priority = 2;
    public $category_id = 1;
    public $date;
    public $date_hour = '00';
    public $date_min = '00';
    public $user_id;

    public $categories;
    public $category_name;
    protected $rules = [
        'name' => 'required|max:255|',
        'user_id' => 'required',
    ];

    public function createTask()
    {
        $task = $this->validate();
        $task = new Task();
        $task->name = $this->name;
        $task->priority = $this->priority;
        if (isset($this->category_id)) {
            if ($this->category_id === 'create_category') {
                if(isset($this->category_name)){
                    $category = new Category();
                    $category->name = $this->category_name;
                    $category->user_id = $this->user_id;
                    $category->save();
                    $task->category_id = $category->id;
                }else{
                    $task->category_id = 1;
                }
            } else {
                $task->category_id = $this->category_id;
            }
        }
        if (isset($this->date)) {
            $date_sec = '00';
            $string = $this->date . ' ' . $this->date_hour . ':' . $this->date_min . ':' . $date_sec;
            $timestamp = date('Y-m-d H:i:s', strtotime($string));
            $task->date = $timestamp;
        };
        $task->user_id = $this->user_id;
        $task->save();
        return redirect()->route('tasks');
    }
    public function render()
    {
        return view('livewire.task-create');
    }
}
