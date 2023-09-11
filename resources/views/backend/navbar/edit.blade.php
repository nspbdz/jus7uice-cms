<form action="{{url(BACKEND_PATH.'navbar.update')}}" method="post" id="ajxForm">

  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Title</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{$data->title}}" />
	</div>
  </div>

  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Url</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Enter url" name="url" value="{{$data->url}}" />
	</div>
  </div>

  <!-- <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Position</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Enter position" name="position" value="{{$data->position}}" />
	</div>
  </div> -->




  <div class="form-footer">
	<button type="submit" class="btn btn-primary">Submit</button>
  </div>
  @csrf
  {{html()->hidden('id',$data->id)}}
</form>
