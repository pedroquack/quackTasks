<?php

use App\Jobs\SendNotification;
use App\Mail\TaskNotification;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;




Schedule::job(new SendNotification)->twiceDailyAt(10,22);
