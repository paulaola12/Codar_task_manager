<?php

namespace App\Http\Controllers;

use App\Models\supervisors;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supervisor = supervisors::latest()->get();

        return view('taskmanager.supervisor.supervisor_listing', [

            'supervisor' => $supervisor
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taskmanager.supervisor.supervisor_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // dd($request->all());
        $formField = $request -> validate([
            'supervisor_name' => 'required',
            'home_address' => 'required',
            'phone_number' => 'required',
            'studio' => 'required',
        ]);

        // dd($formField);

        supervisors::create($formField);

        return redirect('/supervisor_manager/supervisor');
    }

    /**
     * Display the specified resource.
     */
    public function show(supervisors $id)
    {
        return view('taskmanager.supervisor.supervisor_edit', [
            'supervisor' => $id
        ]);
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
    public function update(Request $request, supervisors $id)
    {
        $formField = $request -> validate([
            'supervisor_name' => 'required',
            'home_address' => 'required',
            'phone_number' => 'required',
            'studio' => 'required',
        ]);

        // dd($formField);

        $id->update($formField);

        return redirect('/supervisor_manager/supervisor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
