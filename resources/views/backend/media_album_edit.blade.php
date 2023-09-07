<form action="{{url(BACKEND_PATH.'media.album.edit')}}" method="post" id="ajxForm">

  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Title</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{$data->title}}" />
	</div>
  </div>
    
  <div class="form-group row">
	<label class="form-label col-3 col-form-label pt-0">Status</label>
	{{html()->hidden('status',0)}}
	<div class="col">
	  <label class="form-check">
		<input class="form-check-input" type="checkbox" name="status" value="1" {{(($data->status==1)?"checked":"")}}><span class="form-check-label">Active</span>
	  </label>
	</div>
  </div>
  
  <div class="form-footer">
	<button type="submit" class="btn btn-primary">Submit</button>
  </div>
  @csrf
  {{html()->hidden('uuid',$data->uuid)}}
</form>