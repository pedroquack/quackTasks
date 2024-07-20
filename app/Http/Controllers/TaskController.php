<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function destroy($id){
        $task = Task::find($id);
        if(!isset($task)){
            http_response_code(404);
            abort(404);
        }
        $task->delete();
        return redirect()->back();
    }
}
