<?php

namespace App\Jobs;

use App\Mail\TaskNotification;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendNotification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tomorrow = Carbon::now()->addDay();
        $yesterday = Carbon::yesterday();
        $tasks = Task::where('date', '<=', $tomorrow)->where('date', '>', $yesterday)->where('completed', 0)->get();
        foreach($tasks as $task){
            Mail::to($task->user->email)->send(new TaskNotification($task));
        }
    }
}
