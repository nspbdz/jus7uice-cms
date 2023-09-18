@extends('layout.backend')


@section('page_pretitle')

@endsection

@section('page_title')
Widget
@endsection

@section('page_nav_button')
<a href="{{url(BACKEND_PATH.'widget.create')}}" class="btn btn-primary d-none d-sm-inline-block" data-toggle="ajaxModal" data-title="Administrator Group | Add New" data-class="modal-lg">
	Add New
</a>
@endsection

@section('content')

	
	<div class="row">
	<div class="col">
		<form role="form" action="{{url(BACKEND_PATH.'widget.delete')}}" method="post" id="ajxFormDelete">
			<div class="card">
				<div class="card-body">
				
					<div class="table">
						<table id="dataTbl" class="table table-striped card-table table-vcenter text-nowrap datatable" data-ajax="{{url(BACKEND_PATH.'widget.data')}}" data-processing="true" data-server-side="true" data-length-menu="[50,100,250]" data-ordering="true" data-col-reorder="true">
							<thead>
							<tr>
								<th data-data="chkbox" data-orderable="false"><input class="form-check-input" type="checkbox" id="select-all" /></th>						
								<th data-data="name" data-class-name="name">Name</th>
								<th data-data="status">Status</th>
								<th data-data="action" data-class-name="text-end"></th>
							</tr>
							</thead>
							
						</table>
					</div>
								
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-danger">Disabled</button>
					@csrf
				</div>
			</div>
		</form>
	</div>
	</div>	  
		  
		  
          
	
@endsection