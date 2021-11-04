<?php

namespace App\Http\Controllers;

use App\Models\Installmentplan;
use App\Models\Installmentplansub;
use App\Models\Project;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstallmentplanController extends Controller
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
        
        $data = Installmentplan::join('projects','projects.id','=','installmentplans.project_id')
        ->join('sizes','sizes.id','=','installmentplans.size_id')
        ->get([DB::raw('projects.name as pname'),DB::raw('sizes.name as sname'),'installmentplans.plan_detail'
        ,'installmentplans.type','installmentplans.noi','installmentplans.total_amount','installmentplans.id']);
        
        return view('plan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();   
        $size = Size::all();
        return view('plan.create',compact('project','size'));
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
            'project_id' => 'required', 
            'size_id' => 'required',  
            'type' => 'required',  
            'plan_detail' => 'required', 
            'total_amount' => 'required', 
        ]);
        $input['project_id'] = $request->input('project_id');
        $input['size_id'] = $request->input('size_id');
        $input['type'] = $request->input('type');
        $input['plan_detail'] = $request->input('plan_detail'); 
        $input['total_amount'] = $request->input('total_amount'); 
        $input['noi'] = $request->input('noi'); 
        $input['status']=0;
        $plan = Installmentplan::create($input);

        $last = DB::table('installmentplans')->latest('id')->first();

        for($i=1;$i<=$request['total_row'];$i++)
        {
            $inputsub['plan_id']=$last->id;
            $inputsub['remarks']=$request['ins'.$i];
            $inputsub['amount']=$request['ins_amount'.$i];
            $plan_sub = Installmentplansub::create($inputsub);
        }
    
        return redirect()->route('plan.index')->with('success', 'Plan created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Installmentplan  $installmentplan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $plan = Installmentplan::find($id);
        $project = Project::find($plan->project_id);  
        $size = Size::find($plan->size_id);
        $plan_sub = Installmentplansub::where('plan_id',$plan->id)->get();
        return view('plan.show',compact('plan','project','size','plan_sub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Installmentplan  $installmentplan
     * @return \Illuminate\Http\Response
     */
    public function edit(Installmentplan $installmentplan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Installmentplan  $installmentplan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Installmentplan $installmentplan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Installmentplan  $installmentplan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installmentplan $installmentplan)
    {
        //
    }
}
