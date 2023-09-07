<form action="{{url(BACKEND_PATH.'administrator.account.edit')}}" method="post" id="ajxForm">

  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Group *</label>
	<div class="col">
		{{ html()->select('group', $groupList)->class(['form-select'])->value($data->admin_group_id)}}
	</div>
  </div>
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Userame *</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Username" name="username" value="{{$data->username}}" />
	</div>
  </div>
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Name *</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Name" name="name" value="{{$data->name}}" />
	</div>
  </div>
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Email</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Email" name="email" value="{{$data->email}}" />
	  <small class="form-hint">We'll never share your email with anyone else.</small>
	</div>
  </div>
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Password</label>
	<div class="col">
	  <input type="password" class="form-control" placeholder="Password" name="password" />
	  <small class="form-hint">
		<p class="text-red"><b>Alert: Fill if you want change current password</b></p>
		Your password must be 4-20 characters long, contain letters and numbers, and must not contain
		spaces, special characters, or emoji.
	  </small>
	</div>
  </div>
 
  <div class="form-footer">
	<button type="submit" class="btn btn-primary">Submit</button>
  </div>
  @csrf
  {{html()->hidden('id',$data->id)}}
</form>