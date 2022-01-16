<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
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
    public function store(TaskRequest $request)
    {
        //
        $input = $request->all();
        $task =Task::create($input);
        $task->users()->attach($request->assignee);

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
        $categories = Category::all();
        $users = User::all();
        return view('tasks.edit',compact('task','users','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task, TaskRequest $taskRequest)
    {
        // Here we check if the current user is the author of the task
        // The right is defined in Task policy.
        if ($request->user()->cannot('update', $task)) {
            return redirect()->back()->withErrors(['You do not have this right!']);
        }

        // the validation below can also be transfered to Form Requests method.
        $input = $taskRequest->all();
        $task->users()->sync($request->assignee);
        $task->update($request->all(),$input);

        return redirect()->route('tasks.index')
                        ->with('success','Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        //
        // Here we check if the current user is the author of the task
        // The right is defined in Task policy.
        if ($request->user()->cannot('delete', $task)) {
            return redirect()->back()->withErrors(['You do not have this right!']);
        }

        $task->delete();
        $task->users()->sync($request->assignee);
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
        $assignee= $request->assignee;
        $owner = $request->owner;
        $data = Task::ofStatus($status)
                    ->ofStartDate($start_date)
                    ->ofEndDate($end_date)
                    ->OfAssignedToMe($assignee)
                    ->OfCreatedByMe($owner)
                    ->get();
        return view('tasks.filterTasks',compact('data','request'));
    }
}