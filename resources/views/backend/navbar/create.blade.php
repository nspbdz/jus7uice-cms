<form action="{{url(BACKEND_PATH.'navbar.create')}}" method="post" id="ajxForm">

    <div class="form-group mb-3 row">
        <label class="form-label col-3 col-form-label">Title</label>
        <div class="col">
            <input type="text" class="form-control" placeholder="Enter Title" name="title" required />
        </div>
        @error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


    <div class="form-group mb-3 row">
        <label class="form-label col-3 col-form-label">Url</label>
        <div class="col">
            <input type="text" class="form-control" placeholder="Enter url" name="url" required />
        </div>
        @error('url')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    @csrf
</form>


<script>
    // Tangani submit formulir dengan AJAX
    $('#ajxForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            // type: 'POST',
            // url: $(this).attr('action'),
            // data: $(this).serialize(),
            success: function(response) {
                // Redirect ke halaman indeks (atau halaman lain yang sesuai)
                window.location.href = "{{url(BACKEND_PATH.'navbar')}}";
            },
            error: function(error) {
                // Tangani kesalahan jika ada
            }
        });
    });
</script>
