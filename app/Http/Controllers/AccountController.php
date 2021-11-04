<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Accountparent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Account::join('accountparents','accountparents.id','=','accounts.ap_id')
        ->get([DB::raw('accountparents.name as aname'),'accounts.name','accounts.code','accounts.detail'
        ,'accounts.id']);
        
        return view('account.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountparent = Accountparent::all();
        $account = Account::all();
        return view('account.create',compact('accountparent','account'));
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
                'ap_id' => 'required',
                'detail' => 'required',
                'code' => 'required',
            ]);
            
    
            $input = $request->all(); 
            $input['type']=1;
            $input['reference']=0;

            if(empty($request->input('parent_id')))
            {
                $input['parent_id']=0;    
            }
        
            $account = Account::create($input);
        
            return redirect()->route('account.index')->with('success', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accounts = Account::find($id);
        $accountparent = Accountparent::all();
        $account = Account::all();
        return view('account.edit',compact('accountparent','account','accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'ap_id' => 'required',
            'detail' => 'required',
            'code' => 'required',
        ]);
        

        $input = $request->all(); 
        $input['type']=1;
        $input['reference']=0;

        if(empty($request->input('parent_id')))
        {
            $input['parent_id']=0;    
        } 

        $account = Account::find($id);
        $account->update($input);
    
        return redirect()->route('account.index')->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    
    {
        Account::find($id)->delete();

        return redirect()->route('account.index')->with('success', 'Account successfully.');
    }
}
