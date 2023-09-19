<!-- Edit Form -->
<form action="{{url(BACKEND_PATH.'widget.update')}}" method="post" id="ajxForm">

	<!-- <div class="form-group mb-3 row">
		<select disabled class="form-control" name="widget_id" id="widget" class="form-control @error('widget') is-invalid @enderror" value="{{old('widget')}}">
			@foreach($widget as $value)
			<option @selected($value->id == $dataWidgetById->id)
				value="{{ $value->id }}">{{ $value->name }}</option>
			@endforeach
		</select>

	</div> -->

	<div class="form-group mb-3 row">
		<label class="form-label col-3 col-form-label">Title</label>
		<div class="col">
			<input type="text" class="form-control" placeholder="Enter title" name="widget_name" value="{{$dataWidgetById->name}}" />
			<input type="hidden" name="widget_id" value="{{$dataWidgetById->id}}">
		</div>
	</div>

	<div class="form-group mb-3 row">
		<label class="form-label col-3 col-form-label">Navbar IDs</label>
		<div class="col">
			<div class="card">
				<div class="card-body scrollable_box">
					@foreach($navbars as $navbar)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="navbar_ids[]" value="{{ $navbar->id }}" id="navbar{{ $navbar->id }}" {{ in_array($navbar->id, $selectedNavbarIds) ? 'checked' : '' }}>
						<label class="form-check-label" for="navbar{{ $navbar->id }}">
							{{ $navbar->title }}
						</label>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="form-group row">
		<label class="form-label col-3 col-form-label pt-0">Status</label>
		{{html()->hidden('status',0)}}
		<div class="col">
			<label class="form-check">
				<input class="form-check-input" type="checkbox" name="status" value="1" {{(($dataWidgetById->status==1)?"checked":"")}}><span class="form-check-label">Active</span>
			</label>
		</div>
	</div>

	<div class="form-footer">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
	@csrf
</form>