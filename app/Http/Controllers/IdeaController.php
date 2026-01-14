<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Idea;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function save(Request $request, Task $task)
    {
        Idea::create([
            'task_id' => $task->id,
            'owner_id' => Auth::id(),
            'comment' => $request->get('comment'),
        ]);

        return redirect(route('task.list'));
    }


    public function list(Task $task)
    {
        $ideas = Idea::all();
        $customers = Customer::all();
        $solvers = User::all();
        $categories = Category::all();
        return view('idea', compact('customers', 'solvers', 'categories', 'ideas', 'task'));
    }
}
