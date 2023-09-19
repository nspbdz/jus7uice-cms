<form action="{{url(BACKEND_PATH.'widget.create')}}" method="post" id="ajxForm">


	<div class="form-group mb-3 row">
    <label for="widget" class="col-sm-2 col-form-label">Select widget:</label>
    <div class="col-sm-10">
        <div class="custom-select">
            <select id="widget" name="widget" class="form-control">
                <option value="">Select a user</option>
                @foreach($widget as $widgets)
                    <option value="{{ $widgets->id }}">{{ $widgets->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>



	<div class="form-group mb-3 row">
		<label class="form-label col-3 col-form-label"> url </label>
		<div class="col">
			<div class="card">
				<div class="card-body scrollable_box">
					@foreach($navbars as $navbar)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="navbar_ids[]" value="{{ $navbar->id }}" id="navbar{{ $navbar->id }}">
						<label class="form-check-label" for="navbar{{ $navbar->id }}">
							{{ $navbar->title }}
						</label>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</div>

	
	

	<div class="form-footer">
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
	@csrf
</form>