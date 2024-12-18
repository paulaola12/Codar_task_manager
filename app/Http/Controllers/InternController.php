<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\interns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intern = interns::oldest()->get();
        

        return view('taskmanager.intern.intern_listing', [
            'intern' => $intern,
           
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
            'email'  => 'required',
            'phone_number'  => 'required',
           'home_address'  => 'required',
           'class' => 'required',
           'studio'  => 'required',
           'password'  => 'required',
           'role' => 'required'

        ]);

        // dd($formField);

        $formField['password'] = bcrypt( $formField['password']);

        interns::create($formField);

        return redirect('/intern/intern');
    }

    /**
     * Display the specified resource.
     */
    public function show(interns $id)
    {
        return view('taskmanager.intern.intern_edit', [
            'intern' => $id
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
    public function update(Request $request, interns $id)
    {
        $formField = $request -> validate([
            'intern_name' => 'nullable',
            'email'  => 'nullable',
            'phone_number'  => 'nullable',
           'home_address'  => 'nullable',
           'class' => 'nullable',
           'studio'  => 'nullable',
           'password'  => 'nullable',
           'role' => 'required',
        ]);

        $id->update($formField);

        return redirect('/intern/intern');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(interns $id)
    {
        $id->delete();
        return redirect('/intern/intern');
    }

     /**
     * Display Log-in page for interns.
     */
    public function show_login()
    {
        return view('loginpage.intern_login');
    }

    public function login(Request $request)
    {
        //   dd($request->all());

           $request -> validate([
            'email' => 'required',
            'password'=> 'required',
        ]);

        // dd($formField);


        if (Auth::guard('intern')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect('intern/dashboard');
        }

        // return redirect('/intern/show_login');
        return back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::guard('intern')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/intern/show_login');
    }

      /**
     * Show the form for creating a new resource.
     */
    public function show_dashboard()
    {
       $intern = Auth::guard('intern')->user();

        $task = tasks::where('intern', $intern->intern_name)->get();
  
        // dd($task);

        return view('dashboard.intern_dashbaord', [
            'task' => $task,
            'user' => $intern
        ]);
    }
    

}
