@extends('layout.backend')


@section('page_pretitle')

@endsection

@section('page_title')
Page Create
@endsection

@section('content')

<div class="container-fluid">
	<form action="{{url(BACKEND_PATH.'page.create')}}" method="post" enctype=multipart/form-data>
		@csrf
		<div class="mb-3">
			<label class="form-label">Page</label>
			<input type="text" class="form-control" name="page" id="page" placeholder="Input placeholder" value="{{ old('page') }}">
			@error('page')
			<span class="text-danger">{{ $message }}</span>
			@enderror
		</div>
		

		<!-- <div class="form-group mb-3 ">
			<label class="form-label col-3 col-form-label"> url </label>
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
		</div> -->


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

</script>

<script>
    document.getElementById('page').addEventListener('input', function () {
        this.value = this.value.toLowerCase();
    });
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