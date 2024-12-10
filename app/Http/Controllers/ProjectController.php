<?php

namespace App\Http\Controllers;

use App\Models\companys;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('taskmanager.projects.project_listing');
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
             'priority_id' => 'required',
            'company' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'message' => 'required',
        ]);

        dd($formField);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
