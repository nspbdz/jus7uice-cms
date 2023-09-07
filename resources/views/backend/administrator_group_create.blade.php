<form action="{{url(BACKEND_PATH.'administrator.group.create')}}" method="post" id="ajxForm">

  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Name</label>
	<div class="col">
	  <input type="text" class="form-control" placeholder="Enter name" name="name" />
	</div>
  </div>
  
  
  <div class="form-group mb-3 row">
	<label class="form-label col-3 col-form-label">Restrical Path(s)</label>
	<div class="col">
		<div class="card">
		  <div class="card-body scrollable_box">
				<?php					
					foreach($routeLists as $key=>$val){	
						echo '<label>'.html()->checkbox('route[]')->value($val)->checked(true)->class('form-check-input my_checkbox').' '.$val.'</label><br />';
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