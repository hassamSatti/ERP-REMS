<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
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
        $data = City::latest()->paginate(500);

        return view('city.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all();
        return view('city.create',compact('country'));
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
            'country' => 'required',
        ]);
        $input = $request->except(['_token']);
    
        City::create($input);
    
        return redirect()->route('city.index')->with('success','City created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);

        return view('city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);
        
        $country = Country::all();

        return view('city.edit',compact('city','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'country' => 'required',
        ]);

        $city = City::find($id);
    
        $city->update($request->all());
    
        return redirect()->route('city.index')
            ->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        City::find($id)->delete();
    
        return redirect()->route('city.index')
            ->with('success', 'City deleted successfully.');
    }
}
