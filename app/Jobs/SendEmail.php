<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Task;
use App\Mail\TaskEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
    public function handle()
    {
        $taskLimit = Carbon::now()->addDay();
        $tasks = Task::where('date','<=',$taskLimit)->where('completed',0)->get();
        foreach ($tasks as $task) {
           Mail::to($task->user)->send(new TaskEmail($task));
        };
    }
}
