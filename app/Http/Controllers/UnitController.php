<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Street;
use App\Models\Size;
use App\Models\Allotment;
use App\Models\Installmentplan;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
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
        // for($i=208;$i<10000;$i++)
        // {
        //     $input['project_id']=1;
        //     $input['sector_id']=1;
        //     $input['street_id']=1;
        //     $input['size_id']=1;
        //     $input['type']=1;
        //     $input['category']=1;
        //     $input['price']=120000;
        //     $input['name']=$i;
        //     $input['status']=0;
        //     $unit = Unit::create($input);
        // }
        // dd(123);
        // $data =Unit::join('projects','projects.id','=','units.project_id')
        // ->join('sectors','sectors.id','=','units.sector_id')
        // ->join('streets','streets.id','=','units.street_id')
        // ->join('sizes','sizes.id','=','units.size_id')
        // ->get([DB::raw('projects.name as pname'),DB::raw('sectors.name as secname'),DB::raw('streets.name as sname'),
        // DB::raw('sizes.name as siname'),DB::raw('units.name as uname')
        // ,'units.price','units.id']);
        
        // return view('unit.index', compact('data'));
        // dd($this->middleware('permission:Inventory Edit', ['only' => ['edit','update']]));
        return view('unit.index');
    }

    public function getUnits(Request $request){

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Unit::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Unit::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Unit::join('projects','projects.id','=','units.project_id')
            ->join('sectors','sectors.id','=','units.sector_id')
            ->join('streets','streets.id','=','units.street_id')
            ->join('sizes','sizes.id','=','units.size_id')
            ->orderBy($columnName,$columnSortOrder)
            ->where('units.name', 'like', '%' .$searchValue . '%')
            ->select([DB::raw('projects.name as pname'),DB::raw('sectors.name as secname'),DB::raw('streets.name as sname'),
            DB::raw('sizes.name as siname'),DB::raw('units.name as uname')
            ,'units.price','units.id'])
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
         
        $i=0;    
        foreach($records as $record)
        {
            $i++;
            $id = $i;
            $pname = $record->pname;
            $secname = $record->secname;
            $sname = $record->sname;
            $siname = $record->siname;
            $uname = $record->uname;
            $price = $record->price;
            $btn='';
            
            $btn = '<a class="btn btn-primary btn-xs" href="'.route('unit.edit',$record->id).'">
            <i class="fa fa-pen text-white" data-feather="edit"></i></a>';
             
            $btn = $btn.' <a class="btn btn-danger btn-xs" href="/unit/destroy/'.$record->id.'">
            <i class="far fa-trash-alt text-white" data-feather="delete"></i></a>'; 
            
               
           $data_arr[] = array(
               "id" => $id,
               "pname" => $pname,
               "secname" => $secname,
               "sname" => $sname,
               "siname" => $siname,
               "uname" => $uname,
               "price" => $price,
               "action"=> $btn
                     
           );
        }

        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );

        return response()->json($response); 
     }

    
     public function getSector(Request $request)
    {
        $sector = DB::table("sectors")->where("project_id", $request->project_id)->pluck("name", "id");
        return response()->json($sector);
    }

    public function getStreet(Request $request)
    {
        $street = DB::table("streets")->where("sector_id", $request->sector_id)->pluck("name", "id");
        return response()->json($street);
    }

    public function getPlan(Request $request)
    {
        $plan = Installmentplan::join('projects','projects.id','=','installmentplans.project_id') 
        ->join('sizes','sizes.id','=','installmentplans.size_id') 
        ->where('projects.id', '=', ''.$request->project.'') 
        ->where('sizes.id', '=', ''.$request->size.'')
        ->pluck('installmentplans.plan_detail','installmentplans.id');
        return response()->json($plan);
    }

    public function getUnit(Request $request)
    {
        $unit = Unit::join('projects','projects.id','=','units.project_id')
        ->join('sectors','sectors.id','=','units.sector_id')
        ->join('streets','streets.id','=','units.street_id')
        ->join('sizes','sizes.id','=','units.size_id')
        ->where('units.type', '=', ''.$request->type.'')
        ->where('projects.id', '=', ''.$request->project.'')
        ->where('sectors.id', '=', ''.$request->sector.'')
        ->where('streets.id', '=', ''.$request->street.'')
        ->where('sizes.id', '=', ''.$request->size.'')
        ->pluck('units.name','units.id');
        return response()->json($unit);
    }

    public function getMsno(Request $request)
    {
        $totalRecords = Allotment::select('count(*) as allcount')->count();

        $project=Project::find($request->project);
        $size=Size::find($request->size); 
        $type='';
        if($request->type==1)
        {
            $type="R";
        }
        if($request->type==2)
        {
            $type="C";
        }
        
        $msno=$project->short_code.' - '. ($totalRecords+1) .' - '.$size->name.' - '.$type;
             
        return $msno;
    }

    public function getUnitprice(Request $request)
    { 
        $unit=Unit::find($request->unit); 
             
        return $unit->price;
    }

    public function getMembercnic(Request $request)
    { 
        $member = DB::table("members")->where("cnic", $request->cnic)->pluck("sodowo", "name");
        return response()->json($member);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $project = Project::all();  
        // $sector = Sector::all(); 
        // $street = Street::all();
        $size = Size::all();
        return view('unit.create',compact('project','size'));
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
            'sector_id' => 'required',
            'street_id' => 'required',
            'size_id' => 'required',
            'type' => 'required',
            'category' => 'required',
            'price' => 'required',
            'name' => 'required',
        ]);
        $input = $request->all(); 
        $input['status']=0;
        $unit = Unit::create($input);
    
        return redirect()->route('unit.index')->with('success', 'Unit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {         
        $unit = Unit::find($id);
        $project = Project::all();  
        $size = Size::all();
        return view('unit.edit',compact('unit','project','size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'project_id' => 'required',
            'sector_id' => 'required',
            'street_id' => 'required',
            'size_id' => 'required',
            'type' => 'required',
            'category' => 'required',
            'price' => 'required',
            'name' => 'required',
        ]);
        $input = $request->all(); 
        $input['status']=0; 
        $unit = Unit::find($id);
        $unit->update($input);
    
        return redirect()->route('unit.index')->with('success', 'Unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unit::find($id)->delete();

        return redirect()->route('unit.index')->with('success', 'Unit deleted successfully.');
    }
}
