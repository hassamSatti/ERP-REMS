<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
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
        
        $data = Size::orderBy('id', 'desc')->paginate(5000);

        return view('size.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('size.create');
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
            'area' => 'required', 
            'code' => 'required', 
        ]);
        

        $input = $request->all(); 
    
        $size = Size::create($input);
    
        return redirect()->route('size.index')->with('success', 'Size created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $size = Size::find($id); 
 
        
        return view('size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         
        
        $this->validate($request, [
            'name' => 'required',
            'area' => 'required', 
        ]);
        

        $input = $request->all(); 
     
        $size = Size::find($id);
        $size->update($input);
    
        return redirect()->route('size.index')->with('success', 'Size created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        Size::find($id)->delete();

        return redirect()->route('size.index')->with('success', 'Size deleted successfully.');
    }
}
