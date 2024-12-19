<?php

namespace App\Http\Controllers;

use App\Models\companys;
use Illuminate\Http\Request;
Use App\Models\studios;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $company = DB::table('companys')
        // ->join('studios', 'companys.studios_id', '=', 'studios.id')
        // ->select('companys.id', 'companys.company_name', 'companys.company_description', 'companys.created_at','studios.studio')
        // ->get();

        $company = companys::latest()->get();

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
            'studio' => 'required',
        ]);
        // dd($formField);

        companys::create($formField);

        // Session::flash();

        return redirect('/company_manager/company_listing')->with('company', 'Company Created successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show(companys $id)
    {
       return view('taskmanager.company.company_edit', [
            'company' => $id

       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, companys $id)
    {
            // dd($request ->all());
       $formField = $request ->validate([
        'company_name' => 'required',
        'company_description' => 'required',
        'studio' => 'required',
       ]) ;

       $id->update($formField);

       Session::flash('company', 'Compnay Updated Successfully');

       return redirect('/company_manager/company_listing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(companys $id)
    {
        $id->delete();

        Session::flash('company', 'Deleted Successfully');

        return redirect('/company_manager/company_listing');
    }
}
