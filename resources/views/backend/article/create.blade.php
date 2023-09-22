@extends('layout.backend')


@section('page_pretitle')

@endsection

@section('page_title')
Article Create
@endsection

@section('content')

<div class="container-fluid">
	<form id="articleForm" action="{{url(BACKEND_PATH.'article.create')}}" method="post" enctype=multipart/form-data>
		@csrf
		<div class="mb-3">
			<label class="form-label">Title</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Input placeholder" value="{{ old('title') }}">
			@error('title')
			<span class="text-danger">{{$message}}</span>
			@enderror
		</div>

		<div class="form-group mb-3">
			<label class="form-label col-form-label"> Category </label>
			<div class="card">
				<div class="card-body scrollable_box">
					@foreach($categories as $category)
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="category_ids[]" value="{{ $category->id }}" id="category{{ $category->id }}" {{ in_array($category->id, old('category_ids', [])) ? 'checked' : '' }}>
						<label class="form-check-label" for="category{{ $category->id }}">
							{{ $category->name }}
						</label>
					</div>
					@endforeach

					@if ($errors->has('category_ids'))
					<span class="text-danger">{{ $errors->first('category_ids') }}</span>
					@endif
				</div>
			</div>
		</div>


		<div class="mb-3">
			<div class="form-label">Masukan Thumbnail</div>
			<input type="file" name="thumbnail" id="thumbnail" class="form-control" />
		</div>
		<div class="mb-3">

			<textarea name="content" class="tinymce" id="mytextarea">{{ old('content') }}</textarea>
			@error('title')
			<span class="text-danger">{{$message}}</span>
			@enderror
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


		<div class="card-footer text-end">
			<a href="{{url(BACKEND_PATH.'article')}}" class="btn btn-danger">Back</a>
			<button type="submit" class="btn btn-primary ms-auto">Send data</button>
		</div>
	</form>

</div>

@endsection


@push('js')
<script src="{{ asset('template/tabler/dist/libs/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

<script>
	tinymce.init({
		selector: '.tinymce'
	});
</script>
</head>
</script>
<!-- required category  check -->



@endpush