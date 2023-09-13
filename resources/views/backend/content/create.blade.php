@extends('layout.backend')


@section('page_pretitle')

@endsection

@section('page_title')
Content Create
@endsection

@section('content')

<div class="container-fluid">
	<form action="{{url(BACKEND_PATH.'content.create')}}" method="post" enctype=multipart/form-data>
		@csrf
		<div class="mb-3">
			<label class="form-label">Title</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Input placeholder" value="{{ old('title') }}">
			@error('title')
			<span class="text-danger">{{$message}}</span>
			@enderror
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
			<a href="{{url(BACKEND_PATH.'content')}}" class="btn btn-danger">Back</a>
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



@endpush


<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="{{ asset('template/tabler/dist/libs/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
  </head>

  <body>
    <h1>TinyMCE Quick Start Guide</h1>
    <form method="post">
      <textarea id="mytextarea">Hello, World!</textarea>
    </form>
  </body>
</html> -->