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
		<label class="form-label col-3 col-form-label">Pages</label>
		<div class="col">
			<div class="card">
				<div class="card-body scrollable_box">
					@foreach($pages as $page)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="page_ids[]" value="{{ $page->id }}" id="page{{ $page->id }}" {{ in_array($page->id, $selectedPageIds) ? 'checked' : '' }}>
						<label class="form-check-label" for="page{{ $page->id }}">
							{{ $page->page }}
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
