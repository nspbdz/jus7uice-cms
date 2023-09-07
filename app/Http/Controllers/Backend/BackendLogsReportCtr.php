<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Excel;
use PHPExcel_Worksheet_PageSetup;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

/* Setup */
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Writer;

use Schema;
use DB;


class BackendLogsReportCtr implements FromView, WithEvents, WithCustomCsvSettings
{
   protected $request;
	
	public function __construct(Request $request)
    {
        $this->request = $request;
    }

	 
	function view(): View
	{
		$from = date('Ymd', mktime(0, 0, 0, date("m"), date("d"), date("Y")));
		$to = date("Ymd", mktime(0, 0, 0, date("m"), date("d")+1, date("Y")));
		if($this->request->has('date_from') && $this->request->has('date_to') && $this->request->date_from != "" && $this->request->date_to != ""){
			$from = date("Ymd",strtotime($this->request->date_from));
			$to = date("Ymd",strtotime($this->request->date_to)+(24*3600*1));
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
		if($this->request->has('method') && is_array($this->request->method) && count($this->request->method) > 0){			
			$rows->where(function ($query) {
				foreach($this->request->method as $select) {
					$query->orWhere('method','=', $select);
				}
			});
		}
		
		$rows->orderBy('created_at');
		$data = $rows->get();
		
		return view('backend.backend_logs_export', [
            'data' => $data
        ]);
	} 
	
	 public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
	
	 /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
			// Handle by a closure.
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()->setCreator('Fredy');
            },          
			AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            },
        ];
    }
	
	function getExport(Request $request)
	{
		
		$from = date("Ymd",strtotime($request->date_from??date("Y-m-d"))); 
		$to = date("Ymd",strtotime($request->date_to??date("Y-m-d")));
		
		if($request->has('type')){
			if($request->type=="pdf") return Excel::download(new BackendLogsReportCtr($request), 'transaction_'.$from.'_'.$to.'.pdf');
		}
		return Excel::download(new BackendLogsReportCtr($request), 'transaction_'.$from.'_'.$to.'.csv');
	}
}
