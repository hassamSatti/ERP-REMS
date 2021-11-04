<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:Inventory List', ['only' => ['index','store']]);
         $this->middleware('permission:Inventory Create', ['only' => ['create','store']]);
         $this->middleware('permission:Inventory Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Inventory Delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::orderBy('id', 'desc')->paginate(5000);
        
        return view('project.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',  
            'short_code' => 'required',            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        

        $input = $request->all();
        $imageName = $input['name'].'.'.$request->image->extension();

        $input['image']=$imageName;
        $request->image->move(public_path('images/projects'), $imageName); 
    
        Project::create($input);
    
        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $project = Project::find($id);  
        
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',  
            'short_code' => 'required',            
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        

        $input = $request->all();
        if(!empty($input['image']))
        {
            $imageName = $input['name'].'.'.$request->image->extension();

            $input['image']=$imageName;
            $request->image->move(public_path('images/projects'), $imageName);
        }
        else
        {
            $input = Arr::except($input, array('image')); 
        } 
    
        $project = Project::find($id);
        $project->update($input);
    
        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        Project::find($id)->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
