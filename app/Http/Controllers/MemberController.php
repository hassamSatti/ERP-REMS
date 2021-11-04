<?php

namespace App\Http\Controllers;

use App\Models\Member; 
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:Member List', ['only' => ['index','store']]);
         $this->middleware('permission:Member Create', ['only' => ['create','store']]);
         $this->middleware('permission:Member Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:Member Delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::orderBy('id', 'desc')->paginate(5000);
        
        return view('members.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::all();  
        $country = Country::all();
        return view('members.create',compact('city','country'));
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
            'relation' => 'required',
            'dob' => 'required',
            'sodowo' => 'required',
            'cnic' => 'required',
            'address' => 'required',
            'sec_phone' => 'required',
            'pri_phone' => 'required',
            'city' => 'required',
            'country' => 'required',
            'sec_phone' => 'required',
            'pri_phone' => 'required',
            'email' => 'required|email|unique:members,email',            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        

        $input = $request->all();
        $imageName = $input['name'].'-'.$input['cnic'].'.'.$request->image->extension();

        $input['image']=$imageName;
        $request->image->move(public_path('images/members'), $imageName);
        $input['dob']=date('Y-m-d', strtotime($input['dob']));
    
        $members = Member::create($input);
    
        return redirect()->route('member.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);

        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        $city = City::all();  
        $country = Country::all();
 
        
        return view('members.edit', compact('member','city','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'relation' => 'required',
            'dob' => 'required',
            'sodowo' => 'required',
            'cnic' => 'required',
            'address' => 'required',
            'sec_phone' => 'required',
            'pri_phone' => 'required',
            'city' => 'required',
            'country' => 'required',
            'sec_phone' => 'required',
            'pri_phone' => 'required',
            'email' => 'required',            
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        

        $input = $request->all();

        if(!empty($input['image']))
        {
        $imageName = $input['name'].'-'.$input['cnic'].'.'.$request->image->extension();

        $input['image']=$imageName;
        $request->image->move(public_path('images/members'), $imageName);
        }
        else
        {
            $input = Arr::except($input, array('image')); 
        }


        $input['dob']=date('Y-m-d', strtotime($input['dob']));
        
        $member = Member::find($id);
        $member->update($input);
 
    
        return redirect()->route('member.index')->with('success', 'User Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Member::find($id)->delete();

        return redirect()->route('member.index')->with('success', 'Member deleted successfully.');
    }
}
