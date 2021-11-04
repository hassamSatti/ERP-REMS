<?php

namespace App\Http\Controllers;

use App\Models\Accountgrandparent;
use Illuminate\Http\Request;

class AccountgrandparentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Accountgrandparent::orderBy('id', 'asc')->paginate(5000);
        
        return view('accountgrandparent.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accountgrandparent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accountgrandparent  $accountgrandparent
     * @return \Illuminate\Http\Response
     */
    public function show(Accountgrandparent $accountgrandparent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accountgrandparent  $accountgrandparent
     * @return \Illuminate\Http\Response
     */
    public function edit(Accountgrandparent $accountgrandparent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accountgrandparent  $accountgrandparent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accountgrandparent $accountgrandparent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accountgrandparent  $accountgrandparent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accountgrandparent $accountgrandparent)
    {
        //
    }
}
