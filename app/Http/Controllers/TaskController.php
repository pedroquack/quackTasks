<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('user_id',Auth::user()->id)->orWhere('user_id',null)->get();
        $tasks = Task::orderBy('category_id','desc')->orderBy('priority','desc')->orderBy('date')->orderBy('completed','asc')->get();
        return view('task.index',compact('categories','tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('myTask',$task);
        $rules = [
            'newName' => 'required|max:255',
        ];
        $request->validate($rules);
        $task->name = $request->newName;
        $task->priority = $request->newPriority;
        $task->category_id = $request->newCategory_id;
        if (isset($request->newDate)) {
            $date_sec = '00';
            $string = $request->newDate . ' ' . $request->newDate_hour . ':' . $request->newDate_min . ':' . $date_sec;
            $timestamp = date('Y-m-d H:i:s', strtotime($string));
            $task->date = $timestamp;
        };
        $task->save();
        return redirect()->route('tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('myTask',$task);
        if(isset($task)){
            $task->delete();
        }
        return redirect()->route('tasks');
    }
}
