@extends('layout.backend')


@section('page_pretitle')

@endsection

@section('page_title')
Article Edit
@endsection

@section('content')

<div class="container-fluid">
	<form action="{{url(BACKEND_PATH.'article.update')}}" method="post" enctype=multipart/form-data>
		@csrf
		@method('PUT')
		<div class="mb-3">
			<label class="form-label">Title</label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Input placeholder" value="{{$data->title}}">
			@error('title')
			<span class="text-danger">{{$message}}</span>
			@enderror
		</div>

		<div class="mb-3">
			<div class="form-label">Preview Thumbnail</div>
			@if ($data->thumbnail)
			<img id="newThumbnailImage" src="{{ asset($data->thumbnail) }}" alt="Thumbnail" height="70px" width="100px">
			@else
			<p>Tidak ada thumbnail yang tersedia.</p>
			@endif
		</div>


		<div class="mb-3">
			<div class="form-label">Masukkan Thumbnail Baru</div>
			<input type="file" name="thumbnail" id="thumbnail" class="form-control" />
		</div>
		<br>

		<br>


		<div class="mb-3">

			<textarea name="content" class="tinymce" id="mytextarea">{{ $data->content }}</textarea>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	tinymce.init({
		selector: '.tinymce'
	});

	document.addEventListener("DOMContentLoaded", function() {
		const thumbnailInput = $("#thumbnail");
		const newThumbnailPreview = $("#newThumbnailPreview");
		const newThumbnailImage = $("#newThumbnailImage");
		const removeThumbnailButton = $("#removeThumbnail");

		thumbnailInput.on("change", function() {
			const file = thumbnailInput[0].files[0];
			if (file) {
				newThumbnailImage.attr("src", URL.createObjectURL(file));
				newThumbnailPreview.show();
				$('#oldThumbnail').hide();


			}
		});

		removeThumbnailButton.on("click", function() {
			thumbnailInput.val(""); // Hapus file yang dipilih
			newThumbnailImage.attr("src", ""); // Kosongkan preview
			newThumbnailPreview.hide(); // Sembunyikan preview
		});
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