<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\interns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
           'image' => 'nullable',
           'password'  => 'required',
           'role' => 'required'

        ]);

        // dd($formField);

        $formField['password'] = bcrypt( $formField['password']);

        interns::create($formField);

        return redirect('/intern/intern')->with('intern', 'Intern Created Successfully');;
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

        return redirect('/intern/intern')->with('intern', 'Update was Successfull');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(interns $id)
    {
        $id->delete();
        return redirect('/intern/intern')->with('intern', 'Deleted Successfully');
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
            return redirect('intern/dashboard')->with('intern', 'Logged-in Successfully');
        }

        // return redirect('/intern/show_login');
        return back()->with('intern', 'Invalid Email or Password');
    }

    public function logout(Request $request)
    {
        Auth::guard('intern')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/intern/show_login')->with('intern', 'Logged-in Successfully');
    }

      /**
     * Show the form for creating a new resource.
     */
    public function show_dashboard()
    {
        if(!Auth::guard('intern')->check()){
            return redirect()->route('show_login');
        }

       $intern = Auth::guard('intern')->user();

        $task = tasks::where('intern', $intern->intern_name)->get();
        $pendingTasks = tasks::where('intern', $intern->intern_name)->where('status', 'pending')->select('id')->count();
        $task_count = tasks::where('intern', $intern->intern_name)->count();
        $task_completed = tasks::where('intern', $intern->intern_name)->where('status', 'completed')->where('is_approved', 1)->count();
        $pending_approval = tasks::where('intern', $intern->intern_name)->where('status', 'completed')->where('is_approved', 0)->count();
        // dd($pendingTasks);

        return view('dashboard.intern_dashbaord', [
            'task' => $task,
            'user' => $intern,
            'task_count' => $task_count,
            'task_completed' => $task_completed,
            'pending_approval' => $pending_approval,
            'pendingTasks' => $pendingTasks
        ]);
    }

    public function show_data_page()
    {
        $logged_in_intern = Auth::guard('intern')->user();
        $logged_in_intern = interns::find( $logged_in_intern->id);

       return view('taskmanager.intern.intern_data_page',[
        'logged_in_intern' => $logged_in_intern,
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


        $intern = Auth::guard('intern')->user();

        if (!Hash::check($request->current_password, $intern->password)) {
            // return back()->withErrors(['current_password' => 'The current password is incorrect.']);
            return redirect()->route('intern.datapage')->with('intern', 'Current Password is Incorrect');

        }

        $intern->password = Hash::make($request->new_password);
        $intern->save();

        return redirect()->route('intern.datapage')->with('intern', 'Password Updated Succesfully!');

        // $admin->new_password = Hash::make($request->new_password)
    }

    

}
