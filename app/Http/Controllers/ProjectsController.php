<?php

namespace Danny\Http\Controllers;

use Danny\Project;
use Danny\Company;
use Danny\ProjectUser;
use Danny\User;
use Danny\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $projects = Project::where("user_id",Auth::user()->id)->get();
        return view("projects.index",["projects"=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {   
        $companies = null;
        if (!$company_id) {
            $companies = Company::where("user_id",[Auth::user()->id])->get();
        }
        return view("projects.create",["company_id"=>$company_id ,"companies"=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $this->validate($request,[
        'pname' => 'required|max:255',
        'description' => 'required',
        'days'=>'required|integer'
        ]);
         if (Auth::check()) {
             $project = Project::create([
              "name"=>$request->input("pname"),
              "description"=>$request->input("description"),
              "company_id"=>$request->input("company_id"),
              "user_id"=>Auth::user()->id,
              "days"=>$request->input("days"),

             ]);

             if ($project) {
                 return redirect()->route("projects.show",["project"=>$project->id])->with("success","Project Created Successfully");
             }

             return back()->withInput()->with("errors","Project creation fail");
         }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \Danny\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
       // $project =Project::where("id",$project->id)->first();
        $comments = $project->comments;
        $project =Project::find($project->id);
        return view("projects.show",["project"=>$project,"comments"=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Danny\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::find($project->id);
       // $company =Company::find(1);

        return view("projects.edit",["project"=>$project,"company"=>$project->company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Danny\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if (Auth::check()) {

        $this->validate($request,[
        'pname' => 'required|max:255',
        'description' => 'required',
        'days'=>'required|integer'

        ]);

        $projectUpdate =Project::where("id",$project->id)
        ->update([
         "name"=>$request->input("pname"),
         "description"=>$request->input("description"),
         "company_id"=>$request->input("company_id"),
         "user_id"=>Auth::user()->id,
         "days"=>$request->input("days"),

        ]);

        if ($projectUpdate) {
        return redirect()->route("projects.show",["project"=>$project->id])->with("success","Project updated Successfully");
        }

        return back()->withInput()->with("errors","Project Update Failled");
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Danny\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        dd($project);
    }

    //function to add user to a project
    public function adduser(Request $request){
         
         $this->validate($request,[
          "email"=>"required",
         ]);
         //find a project and attach a user to it
       $project=Project::find($request->input("project_id"));
       if (Auth::user()->id == $project->user_id) {
        $user =User::where("email",$request->input("email"))->first();
       //  //if the email does not exist
       //  if ($user == null) {
       //      return redirect()->route("projects.show",["project"=>$project->id])
       // ->with("errors","The user with email".$request->input("email")." does not exist");
       //  }

        $projectUser = ProjectUser::where("user_id",$user->id)
                                   ->where("project_id",$project->id)
                                    ->first();
        if ($projectUser) {
        return redirect()->route("projects.show",["project"=>$project->id])
       ->with("success",$request->input("email")." already a member of this project");
        }

       if ($user && $project) {
           $project->users()->attach($user->id);
            return redirect()->route("projects.show",["project"=>$project->id])
       ->with("success",$request->input("email")." Added Successfully");
       }
       }
        return redirect()->route("projects.show",["project"=>$project->id])
       ->with("errors","Fail to add user to the project");



        
    }

    public function createPdf(){
         $data = Project::all();
        // dd($data);
        // $data =[
        //         "title"=>"school Mangement System",
        //         "body"=>"for Student information",
        //         "users"=>[
        //           "Daniel",
        //           "Einoth",
        //           "Ayubu",
        //           "Naserian",
        //           "Nedupoto",
        //           "Saitoti",

        //         ]
        // ];

        $pdf = PDF::loadView('pdf.invoice', ["projects"=>$data]);
        return $pdf->download('invoice.pdf');

        
    }
}
