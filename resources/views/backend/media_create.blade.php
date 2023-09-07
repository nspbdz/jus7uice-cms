<form action="{{url(BACKEND_PATH.'media.create')}}" method="post" id="ajxForm" enctype="multipart/form-data">

  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Album *</label>
	<div class="col">
		{{html()->select('album', $albumList)->class(['form-select'])}}
	</div>
  </div>
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Title</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Enter title" name="title" />
	</div>
  </div>
    
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Image File</label>
	<div class="col">
	   <input type="file" class="form-control" name="file" />
	</div>
  </div>
    
  <div class="form-group row">
	<label class="form-label col-3 col-form-label pt-0">Status</label>
	{{html()->hidden('status',0)}}
	<div class="col">
	  <label class="form-check">
		<input class="form-check-input" type="checkbox" checked="" name="status" value="1">
		<span class="form-check-label">Active</span>
	  </label>
	</div>
  </div>
  
  <div class="form-footer">
	<button type="submit" class="btn btn-primary">Submit</button>
  </div>
  @csrf
</form>