<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('loginpage.student_login');
    }

    /**
     * Login Student .
     */
    // public function login(Request $request)
    // {
    //     // dd($request->all());
    //     $formField = $request -> validate([
        
    //         'email' => 'required',
    //         'password'=> 'required',
    //     ]);

    //     // dd($formField);

    //     if(auth()->attempt($formField)){
    //         $request->session()->regenerate();

    //         return redirect('/');
    //     }
    //         return redirect('/admin/register');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
