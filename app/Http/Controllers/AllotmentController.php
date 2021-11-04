<?php

namespace App\Http\Controllers;

use App\Models\Allotment;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Street;
use App\Models\Size;
use App\Models\Member;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class AllotmentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:Allotment List', ['only' => ['index','store']]);
         $this->middleware('permission:Allotment Create', ['only' => ['create','store']]);
         $this->middleware('permission:Allotment Edit', ['only' => ['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('allotment.index');
    }

    public function getAllotments(Request $request)
    {

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
        $totalRecords = Allotment::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Allotment::select('count(*) as allcount')->where('allotment_no', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Allotment::join('projects','projects.id','=','allotments.project_id')
            ->join('members','members.id','=','allotments.member_id')
            ->join('sectors','sectors.id','=','allotments.sector_id')
            ->join('streets','streets.id','=','allotments.street_id')
            ->join('sizes','sizes.id','=','allotments.size_id')
            ->join('units','units.id','=','allotments.unit_id')
            ->orderBy($columnName,$columnSortOrder)
            ->where('allotments.allotment_no', 'like', '%' .$searchValue . '%')
            ->select([DB::raw('projects.name as pname'),DB::raw('sectors.name as secname'),DB::raw('streets.name as sname'),
            DB::raw('sizes.name as siname'),DB::raw('allotments.allotment_no as memname'),DB::raw('members.name as mname'),
            DB::raw('members.cnic as mcnic'),DB::raw('units.name as uname'),'allotments.id'])
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        //dd($records);
        $i=0;    
        foreach($records as $record)
        {
            $i++;
            $id = $i;
            $memname = '<a style="font-size: 15px;" href="'.route('allotment.show',$record->id).'"><b>'.$record->memname.'</b></a>';
            $mname = $record->mname; 
            $mcnic = $record->mcnic; 
            $pname = $record->pname;
            $secname = $record->secname;
            $sname = $record->sname;
            $uname = $record->uname;
            $siname = $record->siname;
            $btn='';
            
            $btn = '<a class="btn btn-primary btn-xs" href="'.route('allotment.show',$record->id).'">
            <i class="fa fa-info text-white" data-feather="edit"></i></a>';
              
            
               
           $data_arr[] = array(
               "id" => $id,
               "memname" => $memname, 
               "mname" => $mname, 
               "mcnic" => $mcnic, 
               "pname" => $pname,
               "secname" => $secname,
               "sname" => $sname,
               "uname" => $uname,
               "siname" => $siname, 
                     
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
        $dealer = Member::all();
        return view('allotment.create',compact('project','size','dealer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $member_id = DB::table('members')->where('cnic', $request->member_id)->first(); 
        
        $user = auth()->user(); 

        $unit_id=$request->input('unit_id');
        if($request->input('category')==2)
        {
            $unit['project_id'] = $request->input('project_id');
            $unit['sector_id'] = $request->input('sector_id');
            $unit['street_id'] = $request->input('street_id');
            $unit['size_id'] = $request->input('size_id');
            $unit['category'] = 1;  
            $unit['type'] = $request->input('type'); 
            $unit['price'] = $request->input('net_price'); 
            $unit['name'] = $request->input('file_no');    
            $unit['status']=0;   
            $unit_data = Unit::create($unit);
            $unit_last = DB::table('units')->latest('id')->first();
            $unit_id=$unit_last->id;
        } 

        $allotment['project_id'] = $request->input('project_id');
        $allotment['sector_id'] = $request->input('sector_id');
        $allotment['street_id'] = $request->input('street_id');
        $allotment['size_id'] = $request->input('size_id');
        $allotment['unit_id'] = $unit_id; 
        $allotment['member_id'] = $member_id->id; 
        $allotment['allotment_date'] = $request->input('allotment_date'); 
        $allotment['remarks'] = $request->input('remarks'); 
        $allotment['allotment_no'] = $request->input('allotment_no'); 
        $allotment['payment_type'] = $request->input('payment_type');   
        $allotment['status']=1;  
        $allotment['user_id']=$user->id;
        $allotment_data = Allotment::create($allotment);

        
        dd($request->all());

        return redirect()->route('allotment.index')->with('success', 'Allotment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Allotment  $allotment
     * @return \Illuminate\Http\Response
     */
    public function show(Allotment $allotment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Allotment  $allotment
     * @return \Illuminate\Http\Response
     */
    public function edit(Allotment $allotment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Allotment  $allotment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allotment $allotment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Allotment  $allotment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
