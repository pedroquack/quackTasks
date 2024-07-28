<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index(){
        $categories = Category::where('user_id', Auth::user()->id)->get();
        return view('tasks.index', compact('categories'));
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
