@extends('layout.backend')


@section('page_pretitle')

@endsection

@section('page_title')
User
@endsection

@section('page_nav_button')
<a href="{{url(BACKEND_PATH.'backend.log.report.export'.(($qs!="")? $qs.'&type=csv':'?type=csv'))}}" target="preview" class="btn btn-primary d-none d-sm-inline-block"> Export to CSV </a>
@endsection

@section('content')

	<div class="row mb-3">
	<div class="col">
	
			<div class="card">
				<div class="card-header">
				  <h3 class="card-title">Filter</h3>
				</div>
				<div class="card-body">
					<form action="" method="get" class="form-inline">	
						<div class="form-group">
							<label>Date</label> &nbsp;&nbsp;
							<input type="text" class="form-control" id="tanggal" autocomplete="off">
							<input type="hidden" id="date_from" name="date_from" value="{{$date_from}}" />
							<input type="hidden" id="date_to" name="date_to" value="{{$date_to}}" />
						</div>
						&nbsp;&nbsp; 	
						<label>Method</label>
						&nbsp;&nbsp;
						{{ html()->select('method[]',['GET'=>'GET','POST'=>'POST'])->value(Request()->method ?? "")->class('form-control multiselect')->multiple()}}
						&nbsp;&nbsp;
						<button type="submit" class="btn btn-success">Search</button>&nbsp;&nbsp;
						<button type="button" class="btn btn-warning pull-right" onclick="location.href='{{Request()->url()}}'">Reset</button>
					</form>
				  
				  
				</div>
			</div>
	
	</div>
	</div>

		  
		  
	<div class="row">
	<div class="col">
		<div class="card">
		<div class="card-body">
			<div class="table">
			<table id="dataTbl" class="table table-striped table-hover datatable" data-ajax="{{url(BACKEND_PATH.'backend.log.data'.$qs)}}" data-processing="true" data-server-side="true" data-state-save="true" data-ordering="true" data-length-menu="[50,100,500]">
				<thead>
				<tr>
					<th data-data="DT_Row_Index" data-orderable="false" data-searchable="false">NO</th>
					<th data-data="created_at">Created at</th>
					<th data-data="method">Method</th>
					<th data-data="url">URL</th>
					<th data-data="request_data">Description & Request</th>
					<th data-data="ip">IP</th>
					<th data-data="user_name">Label / Name</th>
				</tr>
				</thead>
				
			</table>			
			</div>
		</div>
		</div>
	</div>
	</div>
		  
		  
		  
          
	
@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection


@section('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
	$('#tanggal').daterangepicker({
		"minYear": "2020",
		"maxYear": "{{date('Y')}}",
		"locale": {"format": "YYYY-MM-DD"},
		"startDate": "{{$date_from}}",
		"endDate": "{{$date_to}}",
		"maxDate": "{{date('Y-m-d')}}",
		"opens": "right",
		"autoApply": true
	}, function(start, end, label) {
	  $('#date_from').val(start.format('YYYY-MM-DD'));
	  $('#date_to').val(end.format('YYYY-MM-DD'));
	  // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
	});
</script>
@endsection