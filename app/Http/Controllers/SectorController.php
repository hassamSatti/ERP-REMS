<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
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
        
        $data = Sector::join('projects','projects.id','=','sectors.project_id')
        ->get([DB::raw('projects.name as pname'),'sectors.name'
        ,'sectors.id']);
        
        return view('sector.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
        return view('sector.create',compact('project'));
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
            'project_id' => 'required',
            'detail' => 'required',
        ]);
        

        $input = $request->all(); 
    
        $sector = Sector::create($input);
    
        return redirect()->route('sector.index')->with('success', 'Sector created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(Sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $sector = Sector::find($id);
        $project = Project::all();   
 
        
        return view('sector.edit', compact('sector','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        
        $this->validate($request, [
            'name' => 'required',
            'project_id' => 'required',
            'detail' => 'required',
        ]);
        

        $input = $request->all(); 
    
        $sector = Sector::find($id);
        $sector->update($input);
    
        return redirect()->route('sector.index')->with('success', 'Sector updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Sector::find($id)->delete();

        return redirect()->route('sector.index')->with('success', 'Sector deleted successfully.');
    }
}
