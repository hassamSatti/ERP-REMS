<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
         $this->middleware('permission:User List', ['only' => ['index','store']]);
         $this->middleware('permission:User Create', ['only' => ['create','store']]);
         $this->middleware('permission:User Edit', ['only' => ['edit','update']]);
         $this->middleware('permission:User Delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'desc')->paginate(5000);
        
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all(); 
        $department = Department::all();  
        $designation = Designation::all();

        return view('users.create', compact('roles','department','designation'));
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
            'fname' => 'required',
            'image' => 'required',
            'address' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required|not_in:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $imageName = $input['name'].'-'.$input['fname'].'.'.$request->image->extension();

       $input['image']=$imageName;
       $request->image->move(public_path('images/user'), $imageName);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();        
        $role = Role::all(); 
        $userRole = $user->roles->pluck('name', 'name')->all();        
        $department = Department::all();     
        $designation = Designation::all();
 
    
        return view('users.edit', compact('user', 'roles', 'role', 'userRole','department','designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $this->validate($request, [
            'name' => 'required',
            'fname' => 'required',
            //'image' => 'required',
            'address' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'email' => 'required',
            //'password' => 'required|confirmed',
            'roles' => 'required|not_in:0',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $input = $request->all();
        
        // if(!empty($input['password'])) 
        // { 
        //     $input['password'] = Hash::make($input['password']);
        // } 
        // else 
        // {
        //     $input = Arr::except($input, array('password'));    
        // }
        
        if(!empty($input['image']))
        {
            $imageName = $input['name'].'-'.$input['fname'].'.'.$request->image->extension();

            $input['image']=$imageName;
            $request->image->move(public_path('images/user'), $imageName);
        }
        else
        {
            $input = Arr::except($input, array('image'));  
        }
        
        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
