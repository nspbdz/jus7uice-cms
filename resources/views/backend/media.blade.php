@extends('layout.backend')


@section('page_pretitle')

@endsection

@section('page_title')
Media 
@endsection

@section('page_nav_button')
<a href="{{url(BACKEND_PATH.'media.create')}}" class="btn btn-primary d-none d-sm-inline-block" data-toggle="ajaxModal" data-title="Media | Add New">
	Add New
</a>
@endsection

@section('content')

	<div class="row">
	<div class="col">
		<div class="card">
		<div class="card-body">
			<div class="table">
				<table id="dataTbl" class="table table-striped card-table table-vcenter text-nowrap datatable" data-ajax="{{url(BACKEND_PATH.'media.data')}}" data-processing="true" data-server-side="true" data-length-menu="[50,100,250]" data-ordering="true" data-col-reorder="true">
					<thead>
					<tr>
						<th data-data="DT_Row_Index" data-orderable="false" data-searchable="false">NO</th>
						<th data-data="thumbnails">Image</th>	
						<th data-data="album.title" data-default-content="-">Album</th>	
						<th data-data="title">Title</th>
						<th data-data="status">Status</th>
						<th data-data="created_at">Created_at</th>	
						<th data-data="action" data-class-name="text-end"></th>
					</tr>
					</thead>
					
				</table>
			</div>
		</div>
		</div>
	</div>
	</div>
		  
		  
		  
          
	
@endsection