<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function Dashboard(){
        $this->authorize('isAdmin',User::class);
        $users = User::all();
        $tasks = Task::all();
        $categories = Category::all();
        return view('site.dashboard',compact('users','tasks','categories'));
    }
}
