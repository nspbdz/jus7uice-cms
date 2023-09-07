<form action="{{url(BACKEND_PATH.'media.edit')}}" method="post" id="ajxForm" enctype="multipart/form-data">

   <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Album *</label>
	<div class="col">
		{{html()->select('album', $albumList)->value($data->media_album_id)->class(['form-select'])}}
	</div>
  </div>
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Title *</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{$data->title}}" />
	</div>
  </div>
   @if($data->media_thumb_url != "")
   @if(file_exists($data->media_thumb_url))
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Current Image</label>
	<div class="col">
	   <img src="{{url($data->media_thumb_url)}}" />
	</div>
  </div>
  @endif
  @endif
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Replace Image File</label>
	<div class="col">
	   <input type="file" class="form-control" name="file" />
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
  {{html()->hidden('media_thumb_url',$data->media_thumb_url)}}
  {{html()->hidden('media_url',$data->media_url)}}
</form>