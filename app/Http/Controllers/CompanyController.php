<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\companys;
Use App\Models\studios;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = companys::with('studios')->get();;

      

        return view('taskmanager.company.company_listing', [
            'company' => $company
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('taskmanager.company.company_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request ->all());
        $formField = $request->validate([
            'company_name' => 'required',
            'company_description' => 'required',
            'studios_id' => 'required',
        ]);
        // dd($formField);

        companys::create($formField);

        return redirect('/company_manager/company_listing');
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
