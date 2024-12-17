<?php

namespace App\Http\Controllers;

use App\Models\companys;
use App\Models\projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $projects = projects::oldest()->get();
        ;
    
        return view('taskmanager.projects.project_listing', [
            'projects' => $projects,
        ]);
    }

   /**
     * Show Task manager...Ajax
     */
    public function show()
    {
        // $projects = projects::latest()->get();
            // dd($projects);


        // dd($projects_name);

        // $projects = DB::table('projects')
        // ->join('prioritys', 'projects.priority_id', '=', 'prioritys.id')
        // ->select(
        //     'projects.id',
        //     'projects.project_name',
        //     'projects.project_description',
        //     'projects.start_date',
        //     'projects.end_date',
        //     'projects.company',
        //     'prioritys.priority',
        // )
        // ->get();
        // dd([
        //     'projects' => $projects,
        // ]);

        // return view('taskmanager.task.task_new', [
        //     // 'projects' => $projects
        //     dd([
        //            'projects' => $projects,
        //         ])
        // ]);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = companys::latest()->get();

        return view('taskmanager.projects.project_new', [
            'company' => $company
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $formField = $request -> validate([
           'project_name' => 'required',
            'project_description' => 'required',
             'priority' => 'required',
            'company' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'message' => 'required',
        ]);
        
        projects::create($formField);

        return redirect('project_manager/project_listing');
    }

    public function getProjectDetails($project_name)
    {
        // dd($project_name);

        // Fetch the project based on project_name
        $project = projects::where('project_name', $project_name)->first();
            dd($project);
        // If the project is found, return the project details in the view
        if ($project) {
            return response()->json($project);
        } else {
            return response()->json(['error' => 'Project not found'], 404);
        }
    
        }
 
    


   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(projects $id)
    {
        $company = companys::latest()->get();
        return view('taskmanager.projects.projects_edit', [
            'projects' => $id,
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, projects $id)
    {
        // dd($request->all());
        $formField = $request -> validate([
            'project_name' => 'required',
             'project_description' => 'required',
              'priority' => 'required',
             'start_date' => 'nullable',
             'end_date' => 'nullable',
             'message' => 'nullable',

             
         ]);

        //  dd($formField);

         $id->update($formField);

         return redirect('project_manager/project_listing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(projects $id)
    {
        $id->delete();

        return redirect('project_manager/project_listing');
    }
}
