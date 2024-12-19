<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\interns;
use App\Models\projects;
use App\Models\supervisors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

       return redirect('/task_manager/task_listing')->with('task', 'Task Created Successfully');

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

       return redirect('/task_manager/task_listing')->with('task', 'Update Was Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tasks $id)
    {
        $id->delete();
        return redirect('/task_manager/task_listing')->with('task', 'Task Deleted Successfully');; 
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
    // dd($request->all());  
    $task = tasks::find($request->id);

    // dd($task);
    
    if (Auth::guard('intern')->user()->role === 'intern' && $request->status === 'Completed') {   
    }
    // dd($request->status); 
    // Update the task status
    $task->status = $request->status;
    // dd($task);

    // If "Completed" is requested, require approval
    // if ($request->status === 'Completed') {
    //     $task->is_approved = false; 
    // }

    $task->save();

    return  redirect('/intern/dashboard');
    
    // response()->json(['message' => 'Task status updated successfully.']);
}

// public function updateStatus(Request $request)
// {
//     $request->validate([
//         'id' => 'required',
//         'status' => 'required',
//     ]);
    
//     dd($request->all());
//     // Find the task by ID
//     $task = tasks::find($request->id);
//     // dd($task);
//     if (!$task) {
//         return response()->json(['message' => 'Task not found.'], 404); // Task not found
//     }

//     // Check if the user is an intern and trying to mark as Completed
//     if (Auth::guard('intern')->user()->role === 'intern' && $request->status === 'Completed') {
//         return response()->json(['message' => 'Wait for Supervisor or Admin Approval.'], 403);
//     }

//     // Update task status
//     // dd($task->status);
//     $task->status = $request->status;

//     // If "Completed" is requested, require approval
//     if ($request->status === 'Completed') {
//         $task->is_approved = false; // Pending approval
//     }

//     $task->save();

//     return response()->json(['message' => 'Task status updated successfully.']);
// }



public function approveTask(Request $request)
{
    // dd($request->all());
    $request->validate([
        'id' => 'required|exists:tasks,id',
    ]);

    $task = tasks::find($request->id);
    // dd(Auth::guard('admin')->user()->role); 
    // if (Auth::guard('supervisor')->user()->role !== 'supervisor' && Auth::guard('admin')->user()->role !== 'admin') {
    //     return response()->json(['message' => 'Unauthorized.'], 403);
    // }

    $user = Auth::guard('admin')->user() ?: Auth::guard('supervisor')->user();

    // dd($user);

    if (!$user || !in_array($user->role, ['admin', 'supervisor'])) {
        return response()->json(['message' => 'Unauthorized.'], 403);
    }

// Proceed with your logic for admin or supervisor...


    // $task->is_approved = true; // Approve the task
    // $task->save();

    $completedTask = tasks::where('status', 'completed')->first();

    if ($completedTask) {
    $task->is_approved = true; 
    $task->save(); 

    // return redirect('/supervisor/dashboard');

//     if (Auth::guard('supervisor')->user()->role('supervisor')){
//         return redirect('/supervisor/dashboard')->with('supervisor', 'Task Approved Successfully');
//     }
//     elseif(Auth::guard('admin')->user()->role('admin')){
//         return redirect('/')->with('admin', 'Task Approved Sucessfully');
//     }

//   } else{
//     if (Auth::guard('supervisor')->check()) {
//         return redirect('/supervisor/dashboard')->with('admin', 'Unsuccessful');
//     } elseif (Auth::guard('admin')->check()) {
//         return redirect('/')->with('supervisor', 'Unsuccessful');
//     }

if ($user->role === 'supervisor') {
    return redirect('/supervisor/dashboard')->with('supervisor', 'Task Approved Successfully');
} elseif ($user->role === 'admin') {
    return redirect('/')->with('admin', 'Task Approved Successfully');
}
} else {
// Handle unsuccessful case
if (Auth::guard('supervisor')->check()) {
    return redirect('/supervisor/dashboard')->with('supervisor', 'Unsuccessful');
} elseif (Auth::guard('admin')->check()) {
    return redirect('/')->with('admin', 'Unsuccessful');
}
}
  }




}