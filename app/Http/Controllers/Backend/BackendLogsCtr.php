<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Schema;
use Datatables;

class BackendLogsCtr extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		if(Request()->has('date_from') && Request()->date_from != ""){
			$date_from = Request()->date_from;
			$date_to = Request()->date_to;
		} else {
			$date_from = date("Y-m-d");
			$date_to = date("Y-m-d");
		}
		
		if(strtotime($date_from) > strtotime($date_to)){
			// return Redirect('admin.log')->with('msgError',trans('message.date_range_wrong'));
		}
		
		$d_start = new \DateTime($date_from);
		$d_end = new \DateTime($date_to);
		$diff = $d_start->diff($d_end);
		$selisih_hari = $diff->format('%a'); 
				
		if($selisih_hari > 3){
			// return Redirect(BACKEND_PATH.'activity.log')->with('msgError','Pencarian maks. 3 hari');
		}
		
		$qs = str_replace(request()->url(),'',request()->fullUrl()); // echo $qs;
		
		return view('backend.backend_logs',compact('date_from','date_to','qs'));
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {		
		$from = date('Ymd', mktime(0, 0, 0, date("m"), date("d"), date("Y")));
		$to = date("Ymd", mktime(0, 0, 0, date("m"), date("d")+1, date("Y")));
		if($request->has('date_from') && $request->has('date_to') && $request->date_from != "" && $request->date_to != ""){
			$from = date("Ymd",strtotime($request->date_from));
			$to = date("Ymd",strtotime($request->date_to)+(24*3600*1));
		}
		
		$day_from = date("Ymd",strtotime($from));
		$day_to = date("Ymd",strtotime($to));
		
		/* bila bulan beda */
		$dates[] = $day_from;
		if(strtotime($day_from) < strtotime($day_to)){
			$begin 		= new \DateTime($from);
			$end 		= new \DateTime($to);
			$interval 	= \DateInterval::createFromDateString('1 day');
			$period 	= new \DatePeriod($begin, $interval, $end);
			$dates 		= array();
			foreach($period as $dt){
				$bulan = $dt->format("Ymd");
				if(!in_array($bulan,$dates)){
					$dates[] = $bulan;
				}
			}			
		}				

		$i = 0; $fetch=[];
		foreach($dates as $cur_date){
			$table = trim('backend_logs_' . $cur_date);
			/* 1. Collect Table tu be union */
			if(Schema::connection('logs')->hasTable($table)){				
				/* Upgrade tabel XXX_$date */
				$upgrade = New \App\_Upgrade();
				$upgrade->_upgrade_table_backend_log($cur_date);				
				$fetch[$i] = DB::connection('logs')->table($table)
				->select($table.'.*',DB::raw("'{$table}' AS tableName"));				
				$i++;
			}					
		}
		if($i > 0){
			$n = $i-1;	// misal n= 6
			$fetch[$n]; // get query terakhir
			/* 2. UNION SEMUA QUERY KEPADA QUERY TERAKHIR */
			for($x=0; $x < $n; $x++){
				$fetch[$n]->unionAll($fetch[$x]);
			}
		} else return false;
		
		/* 3. UNION BANYAK TABEL DONE */	
		/* Set Query */
		$rows = DB::connection('logs')->table(DB::raw("({$fetch[$n]->toSql()}) as x"))->select(['*']);
				
		/* filter method */
		if($request->has('method') && is_array($request->method) && count($request->method) > 0){			
			$rows->where(function ($query) use ($request) {
				foreach($request->method as $select) {
					$query->orWhere('method','=', $select);
				}
			});
		}
		
        return Datatables::of($rows)
		->addColumn('chkbox',function($row){
			return '<input type="checkbox" name="deleteItems[]" value="'.$row->id.'" />';
		})		
		->addColumn('request_data',function($row){
			$lbl = $row->description;
			$lbl .= ' &nbsp; <a data-bs-toggle="collapse" href="#collapse'.$row->tableName.$row->id.'" aria-expanded="false">{Request}</a>';
			$lbl .= '<div class="collapse" id="collapse'.$row->tableName.$row->id.'"><em>';			
			$lbl .= '<textarea style="width: 100%" rows="4" readonly>'.$row->param.'</textarea>';			
			$lbl .= '</em></div>';
			
			return $lbl;
		})		
		->addIndexColumn()
		->rawColumns(['chkbox','request_data'])
		->make();
    }
}
