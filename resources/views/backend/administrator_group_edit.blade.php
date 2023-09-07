<form action="{{url(BACKEND_PATH.'administrator.group.edit')}}" method="post" id="ajxForm">

  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Name</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{$data->name}}" />
	</div>
  </div>
  
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Restrical Path(s)</label>
	<div class="col">
		<div class="card">
		  <div class="card-body scrollable_box">
				<?php
					foreach($routeLists as $key=>$val){	
						if(isset($data->restrical_path) && in_array($val,json_decode($data->restrical_path))){
						echo '<label>'. html()->checkbox('route[]')->value($val)->checked(true)->class('form-check-input').' '.$val.'</label><br />';
						} else {
						echo '<label>'. html()->checkbox('route[]')->value($val)->checked(false)->class('form-check-input').' '.$val.'</label><br />';
						}
					}
				?>
		  </div>
		</div>
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
  {{html()->hidden('id',$data->id)}}
</form>