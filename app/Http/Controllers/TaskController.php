<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\interns;
use App\Models\projects;
use App\Models\supervisors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = tasks::oldest()->get();

        return view('taskmanager.task.task_listing', [
            // 'producta' => $producta,
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = projects::latest()->get();
        $intern = interns::latest()->get();
        $supervisor = supervisors::latest()->get();
      
        // dd($projects);
        return view('taskmanager.task.task_new', [
            'projects' => $projects,
            'intern' => $intern,
            'supervisor' => $supervisor,
           
      
        ]);

        
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

       $formField = $request -> validate([
            'task_name' => 'required',
            'project_name' => 'required',
            'priority' => 'required',
            'intern' => 'required',
            'supervisor' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'nullable',
       ]);

    //    dd($formField);

       tasks::create($formField);

       return redirect('/task_manager/task_listing');

    //    dd($formField);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $project_name){


        //  dd($id);

    
        $project = projects::where('project_name', $project_name)->first();

        // dd($project);

        if ($project) {
            return response()->json([
                'project_name' => $project->project_name,
                'project_description' => $project->project_description,
                'company' => $project->company,
                'start_date' => $project->start_date,
                'end_date' => $project->end_date,
            ]);
        } else {
            return response()->json(['error' => 'Project not found.'], 404);
        }

        // dd($project);
    
        //    return view('taskmanager.task.task_new',[
        //      'project' => $id
            
        //      ]);

    }
    
        
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tasks $id)
    {
        $intern = interns::all();
        $supervisor = supervisors::all();
        $project = projects::all();
        return view('taskmanager.task.task_edit', [
            'tasks' => $id,
            'intern' => $intern,
            'supervisor' => $supervisor,
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tasks $id)
    {
        // dd($request->all());

        $formField = $request -> validate([

            "task_name" => "required",
            "project_name" => "required",
            "priority" => "required",
            "intern" => "required",
            "supervisor" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "status" => "nullable",        
       ]);

    //    dd($formField);

       $id->update($formField);
    //    tasks::create($formField);

       return redirect('/task_manager/task_listing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // logged in as an intern . steps to update status 


    // public function updateStatus(Request $request)
    // {
       
    //     $request->validate([
    //         'id' => 'required',
    //         'status' => 'required',
    //     ]);

    //     $task = tasks::find($request->id);
    //     $task->status = $request->status;
    //     $task->save();

    //     return response()->json(['status' => 'success', 'message' => 'Task status updated successfully.']);
    // }

public function updateStatus(Request $request)
{
    $request->validate([
        'id' => 'required',
        'status' => 'required',
    ]);

    $task = tasks::find($request->id);

    // Check if the user is an intern
    if (Auth::guard('intern')->user()->role === 'intern' && $request->status === 'Completed') {
        return response()->json(['message' => 'Wait for Supervisor or Admin Approval.'], 403);
    }

    // Update the task status
    $task->status = $request->status;

    // If "Completed" is requested, require approval
    if ($request->status === 'Completed') {
        $task->is_approved = false; // Pending approval
    }

    $task->save();

    return response()->json(['message' => 'Task status updated successfully.']);
}


public function approveTask(Request $request)
{
    $request->validate([
        'id' => 'required|exists:tasks,id',
    ]);

    $task = tasks::find($request->id);

    // supervisors or admins can approve
    if (Auth::guard('supervisor')->user()->role !== 'supervisor' && Auth::guard('admin')->user()->role !== 'admin') {
        return response()->json(['message' => 'Unauthorized.'], 403);
    }

    $task->is_approved = true; // Approve the task
    $task->save();

    // return response()->json(['message' => 'Task approved successfully.']);
    return redirect('/supervisor/dshboard');
}


}
