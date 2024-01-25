<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function NoCategoryTask(User $user, Task $task){
        return $task->user_id === $user->id;
    }
    public function HasTask(User $user){
        return $user->tasks->count() > 0;
    }
    public function myTask(User $user, Task $task){
        return $user->id === $task->user->id;
    }
}
