<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::where('user_id', Auth::user()->id)->orderBy('completed')->orderBy('priority')->orderBy('date')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function destroy($id){
        $task = Task::find($id);
        Gate::authorize('user_task', $task);
        if(!isset($task)){
            http_response_code(404);
            abort(404);
        }
        $task->delete();


        return redirect()->back();
    }
}
