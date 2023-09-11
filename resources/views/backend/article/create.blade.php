@extends('layout.backend')


@section('page_pretitle')

@endsection

@section('page_title')
Article Create
@endsection

@section('content')

<div class="container-fluid">
	<form action="{{url(BACKEND_PATH.'article.create')}}" method="post" enctype=multipart/form-data>
		@csrf
		<div class="mb-3">
			<label class="form-label">Title</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Input placeholder">
			@error('title')
			<span class="text-danger">{{$message}}</span>
			@enderror
		</div>
		<div class="mb-3">
			<div class="form-label">Masukan Thumbnail</div>
			<input type="file" name="thumbnail" id="thumbnail" class="form-control" />
		</div>
		<div class="mb-3">

			<textarea name="content" class="tinymce" id="mytextarea">Hello, World!</textarea>
			@error('title')
			<span class="text-danger">{{$message}}</span>
			@enderror
		</div>
		<div class="card-footer text-end">
			<div class="d-flex">
				<a href="#" class="btn btn-link">Cancel</a>
				<button type="submit" class="btn btn-primary ms-auto">Send data</button>
			</div>
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