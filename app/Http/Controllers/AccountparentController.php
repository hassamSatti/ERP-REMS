<?php

namespace App\Http\Controllers;

use App\Models\Accountparent;
use App\Models\Accountgrandparent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountparentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data = Accountparent::join('accountgrandparents','accountgrandparents.id','=','accountparents.agp_id')
        ->get([DB::raw('accountgrandparents.name as aname'),'accountparents.name','accountparents.code','accountparents.detail'
        ,'accountparents.id']);
        
        return view('accountparent.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountgrandparent = Accountgrandparent::all();
        return view('accountparent.create',compact('accountgrandparent'));
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
            'agp_id' => 'required',
            'detail' => 'required',
            'code' => 'required',
        ]);
        

        $input = $request->all(); 
    
        $sector = Accountparent::create($input);
    
        return redirect()->route('accountparent.index')->with('success', 'Account Parent created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accountparent  $accountparent
     * @return \Illuminate\Http\Response
     */
    public function show(Accountparent $accountparent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accountparent  $accountparent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $accountparent = Accountparent::find($id);
        $accountgrandparent = Accountgrandparent::all();   
 
        
        return view('accountparent.edit', compact('accountparent','accountgrandparent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accountparent  $accountparent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        
        $this->validate($request, [
            'name' => 'required',
            'agp_id' => 'required',
            'detail' => 'required',
            'code' => 'required',
        ]);
        

        $input = $request->all(); 
    
        $accountparent = Accountparent::find($id);
        $accountparent->update($input);
    
        return redirect()->route('accountparent.index')->with('success', 'Account Parent updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accountparent  $accountparent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Accountparent::find($id)->delete();

        return redirect()->route('accountparent.index')->with('success', 'Account Parent successfully.');
    }
}
