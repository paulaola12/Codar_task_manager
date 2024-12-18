<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\supervisors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supervisor = supervisors::oldest()->get();

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
            'email' => 'required',
            'phone_number' => 'required',
            'home_address' => 'required',
            'studio' => 'required',
            'password'=> 'required',
            'role' => 'required',
        ]);

        // dd($formField);

        $formField['password'] = bcrypt( $formField['password']);

        supervisors::create($formField);

        return redirect('/supervisor/supervisor');
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
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, supervisors $id)
    {
        $formField = $request -> validate([
            'supervisor_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'home_address' => 'required',
            'studio' => 'required',
            'password'=> 'required',
        ]);

        // dd($formField);

        $id->update($formField);

        return redirect('/supervisor/supervisor');
    }


    public function show_login()
    {
        return view('loginpage.supervisor_login');
    }

       /**
     * Display Registeration page for Supervisor.
     */
    public function show_register()
    {
        return view('registeration.register_supervisor');
    }

     /**
     * Show the form for creating a new Admin.
     */
    public function login(Request $request)
    
    {
        //   dd($request->all());
           $request -> validate([
                'email' => 'required',
                'password'=> 'required', 
        ]);

        // dd($formField);

        if (Auth::guard('supervisor')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect('/supervisor/dashboard');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::guard('supervisor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/supervisor/show_login');
    }

    public function show_dashboard()
    {
        $supervisor = Auth::guard('supervisor')->user();

        $tasks = tasks::where('supervisor', $supervisor->supervisor_name)->where('is_approved', 0)->get();
        $total_task = tasks::where('supervisor', $supervisor->supervisor_name)->count();
         $total_completed = tasks::where('supervisor', $supervisor->supervisor_name)->where('status', 'completed')->where('is_approved', 1)->count();
        // $display_unapproved = tasks::where('status', 'pending')->orWhere('status', 'completed')->where('is_approved', 0 )->get()
        $total_pending = tasks::where('supervisor', $supervisor->supervisor_name)->whereIn('status', ['completed', 'pending'])->where('is_approved', 0)->count();
        return view('dashboard.supervisor_dashbaord', [
            'tasks' => $tasks,
            'user' => $supervisor,
            'total_task' => $total_task,
            'total_completed' => $total_completed,
            'total_pending' => $total_pending
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(supervisors $id)
    {
        $id->delete();

        return redirect('/supervisor/supervisor');
    }

    // show supervisor Task Listing
    public function show_all_task(){
        $supervisor = Auth::guard('supervisor')->user();

        $Alltasks = tasks::where('supervisor', $supervisor->supervisor_name)->get();

        return view('dashboard.supervisor_sidebar_content.supervisor_task_listing', [
            'Alltasks' => $Alltasks
        ]);         
    }

    // show supervisor Awaiting Approval
        



      /**
     * Show the Supervisor Log In page
     */
    // public function login()
    // {
  
    //     return view('loginpage.supervisor_login');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function login(Request $request)
    // {
    //     //
    // }
}
