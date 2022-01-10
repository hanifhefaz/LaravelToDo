<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::where('isShow',true)->latest()->paginate(5);

        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $users = User::all();
        $tasks = Task::all();
        return view('tasks.create', compact('categories','users','tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->all();

        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')
                        ->with('success','Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $request->validate([
            'title' => 'required',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')
                        ->with('success','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();

        return redirect()->route('tasks.index')
                        ->with('success','Task deleted successfully');
    }

    public function filters()
    {
        return view('tasks.filterTasks');
    }

    public function filterTasks(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $status = $request->status;

        $data = Task::ofStatus($status)
                    ->ofStartDate($start_date)
                    ->ofEndDate($end_date)
                    ->get();
        return view('tasks.filterTasks',compact('data','request'));

    }
}
