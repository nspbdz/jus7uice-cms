<form action="{{url(BACKEND_PATH.'user.edit')}}" method="post" id="ajxForm">

  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Name</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$data->name}}" />
	</div>
  </div>
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Email</label>
	<div class="col">
	  <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{$data->email}}" />
	  <small class="form-hint">We'll never share your email with anyone else.</small>
	</div>
  </div>
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Password</label>
	<div class="col">
	  <input type="password" class="form-control" placeholder="Password" name="password" />
	  <small class="form-hint">
		Your password must be 4-20 characters long, contain letters and numbers, and must not contain
		spaces, special characters, or emoji.
	  </small>
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
  {{html()->hidden('uuid',$data->uuid)}}
  @csrf
</form>