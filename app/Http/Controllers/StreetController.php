<?php

namespace App\Http\Controllers;

use App\Models\Street;
use Illuminate\Http\Request;
use App\Models\Sector;
use Illuminate\Support\Facades\DB;

class StreetController extends Controller
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
        
        
        $data = Street::join('sectors','sectors.id','=','streets.sector_id')
        ->get([DB::raw('sectors.name as sname'),'streets.name'
        ,'streets.id']);
        
        return view('street.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sector = Sector::all();
        return view('street.create',compact('sector'));
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
            'detail' => 'required',
            'sector_id' => 'required', 
        ]);
        

        $input = $request->all(); 
    
        $street = Street::create($input);
    
        return redirect()->route('street.index')->with('success', 'Street created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function show(Street $street)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $street = Street::find($id);
        $sector = Sector::all();   
 
        
        return view('street.edit', compact('sector','street'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'detail' => 'required',
            'sector_id' => 'required', 
        ]);
        

        $input = $request->all(); 
     
        $street = Street::find($id);
        $street->update($input);
    
        return redirect()->route('street.index')->with('success', 'Street updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Street  $street
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        Street::find($id)->delete();

        return redirect()->route('street.index')->with('success', 'Street deleted successfully.');
    }
}
