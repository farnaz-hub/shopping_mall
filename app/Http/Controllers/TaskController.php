<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function add()
    {
        $customers = Customer::all();
        $solvers = User::all();
        $categories = Category::all();
        return view('task.add', compact('categories', 'solvers', 'customers'));
    }


    public function save(Request $request)
    {
        Task::create([
            'title' => $request->get('title'),
            'solver_id' => $request->get('solver_id'),
            'owner_id' => Auth::id(),
            'customer_id' => $request->get('customer_id'),
            'category_id' => $request->get('category_id'),
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time'),
            'status' => $request->get('status'),
            'priority' => $request->get('priority'),
            'image' => $request->get('image'),
            'description' => $request->get('description'),
            'send_message' => $request->get('send_message', 0),
        ]);

        return redirect(route('task.list'));
    }


    public function list()
    {
        $tasks = Task::all();
        return view('task.list', compact('tasks'));
    }


    public function show(Task $task)
    {
        $customers = Customer::all();
        $solvers = User::all();
        $categories = Category::all();
        return view('task.edit', compact('task', 'categories', 'solvers', 'customers'));
    }


    public function update(Request $request, Task $task)
    {
        $task->title = $request->get('title');
        $task->solver_id = $request->get('solver_id');
        $task->customer_id = $request->get('customer_id');
        $task->category_id = $request->get('category_id');
        $task->start_time = $request->get('start_time');
        $task->end_time = $request->get('end_time');
        $task->status = $request->get('status');
        $task->priority = $request->get('priority');
        $task->image = $request->get('image');
        $task->description = $request->get('description');
        $task->send_message = $request->get('send_message', 0);
        $task->update();

        return redirect(route('task.list'));
    }


    public function delete(Task $task)
    {
        $task->delete();
        return redirect(route('task.list'));
    }
}
