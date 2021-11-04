<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:Setting', ['only' => ['index', 'show']]);
         $this->middleware('permission:Setting', ['only' => ['create', 'store']]);
         $this->middleware('permission:Setting', ['only' => ['edit', 'update']]);
         $this->middleware('permission:Setting', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Designation::latest()->paginate(500);

        return view('designation.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designation.create');
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
        ]);
        $input = $request->except(['_token']);
    
        Designation::create($input);
    
        return redirect()->route('designation.index')->with('success','Designation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $Designation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $designation = Designation::find($id);

        return view('designation.show', compact('designation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $Designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation = Designation::find($id);

        return view('designation.edit',compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $designation = Designation::find($id);
    
        $designation->update($request->all());
    
        return redirect()->route('designation.index')
            ->with('success', 'Designation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $Designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Designation::find($id)->delete();
    
        return redirect()->route('designation.index')
            ->with('success', 'Designation deleted successfully.');
    }
}
