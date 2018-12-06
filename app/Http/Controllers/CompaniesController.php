<?php

namespace Danny\Http\Controllers;

use Danny\Company;
use Danny\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       if (Auth::check()) {
        $companies = Company::where("user_id",Auth::user()->id)->get();
        return view("campanies.index",["companies"=>$companies]);   
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("campanies.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $this->validate($request,[
        'cname' => 'required|max:255',
        'description' => 'required',
        ]);
        if (Auth::check()) {
           $company = Company::create([
             "name"=>$request->input("cname"),
             "description"=>$request->input("description"),
             "user_id"=>Auth::user()->id

            ]);

        if ($company) {
           return redirect()->route("companies.show",["company"=>$company->id])->with("success","Company Created successfully"); 
          
          }

          return back()->withInput()->with("errors","Company didin't created successfully");

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \Danny\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
       // $company1=Company::where("id",$company->id)->first();
       $company =Company::find($company->id);
        return view("campanies.show",["company"=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Danny\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company =Company::find($company->id);
        return view("campanies.edit",["company"=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Danny\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //store data
        $companyUpdate = Company::where("id",$company->id)
        ->update([
         "name"=>$request->input("cname"),
         "description"=>$request->input("description")
        ]);

        if ($companyUpdate) {
           return redirect()->route("companies.show",["company"=>$company->id])->with("success","Company updated successfully");
        }

        //return back with input

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Danny\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
       $findCompany= Company::find($company->id);
       if ($findCompany->delete()) {
           return redirect()->route("companies.index")->with("success","Company deleted successfully");
       }

       return back()->withInput()->with("error","Company could not be deleted");
    }
}
