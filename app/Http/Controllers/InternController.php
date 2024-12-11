<?php

namespace App\Http\Controllers;

use App\Models\interns;
use Illuminate\Http\Request;

class InternController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intern = interns::latest()->get();

        return view('taskmanager.intern.intern_listing', [
            'intern' => $intern
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('taskmanager.intern.intern_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
       $formField = $request -> validate([
            'intern_name' => 'required',
            'batch' => 'required',
            'studio' => 'required'
        ]);

        interns::create($formField);

        return redirect('/intern_manager/intern');
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
