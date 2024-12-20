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
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(!Auth::guard('admin')->check()){
            return redirect()->route('show.admin.login');
        }
        $supervisor_count = supervisors::where('role', 'supervisor')->count();
        $intern_count = interns::where('role', 'intern')->count();
        $total_tasks = tasks::count();
        $total_approved = tasks::where('is_approved', '1')->count();
        $display_unapproved = tasks::where('status', 'pending')->orWhere('status', 'completed')->where('is_approved', 0 )->get(); 
        $dont_display_approved = tasks::where('status', 'completed')->where('is_approved', 0 )->count();  
        // dd( $display_unapproved);
        return view('index', [
            'supervisor_count' => $supervisor_count,
            'intern_count' => $intern_count,
            'total_tasks' => $total_tasks,
            'total_approved' => $total_approved,
            'display_unapproved' => $display_unapproved,
            'dont_display_approved' => $dont_display_approved
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
            'image' => 'nullable',
            'password'=> 'required',
            'role' => 'required'

        ]);

        // dd($formField);

        $formField['password'] = bcrypt( $formField['password']);

        admins::create($formField);

        return redirect('/')->with('admin', 'Admin Created Successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show_register()
    {
        return view('taskmanager.admin.admin_new');
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
            return redirect('/')->with('admin', 'Logged In Successfully');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);


       
    }


    /**
     * Log out User
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.admin.login');
    }

     /**
     * Display Data Page .
     */
    public function show_data_page()
    {
        $logged_in_admin = Auth::guard('admin')->user();
        $logged_in_admin = admins::find( $logged_in_admin->id);

       return view('taskmanager.admin.admin_data_page',[
        'logged_in_admin' => $logged_in_admin,
       ]);
        
    }

    /**
     * password chnage
     */
    public function change_password(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required'
        ]);

        // dd('Validation passed');


        $admin = Auth::guard('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->route('admin.datapage')->with('admin', 'Password Updated Succesfully!');

        // $admin->new_password = Hash::make($request->new_password)
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
