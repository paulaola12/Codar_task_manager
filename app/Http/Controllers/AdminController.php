<?php

namespace App\Http\Controllers;
// use auth;

use App\Models\Admin;
use App\Models\tasks;
use App\Models\admins;
use App\Models\interns;
use App\Models\supervisors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supervisor_count = supervisors::where('role', 'supervisor')->count();
        $intern_count = interns::where('role', 'intern')->count();
        $total_tasks = tasks::count();
        $total_approved = tasks::where('is_approved', '1')->count();
        $display_unapproved = tasks::where('status', 'pending')->orWhere('status', 'completed')->where('is_approved', 0 )->get();  
        // dd( $display_unapproved);
        return view('index', [
            'supervisor_count' => $supervisor_count,
            'intern_count' => $intern_count,
            'total_tasks' => $total_tasks,
            'total_approved' => $total_approved,
            'display_unapproved' => $display_unapproved
        ]);
    }

     /**
     * Display Log-in page for Admin.
     */
    public function show_login()
    {
        return view('loginpage.admin_login');
    }

     /**
     * Display Registeration page for Admin.
     */
    public function register()
    {
        return view('register');
    }



    /**
     * Show the form for creating a new Admin.
     */
    public function create(Request $request)
    {
        // dd($request->all());
       $formField = $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'password'=> 'required',

        ]);

        // dd($formField);

        $formField['password'] = bcrypt( $formField['password']);

        admins::create($formField);
        return redirect('/');
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function show_register()
    {
        return view('registeration.register_admin');
    }


    /**
     * Login Admin in Storage.
     */
    public function login(Request $request)
    {
        //   dd($request->all());

           $request -> validate([
            'email' => 'required',
            'password'=> 'required',
        ]);

        // dd($formField);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);


        return redirect('/');
    }


    /**
     * Log out User
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/');
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
