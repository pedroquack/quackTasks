<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function user_task(User $user, Task $task){
        return $user->id === $task->user->id;
    }
}
