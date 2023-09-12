<form action="{{url(BACKEND_PATH.'navbar.create')}}" method="post" id="ajxForm">

    <div class="form-group mb-3 row">
        <label class="form-label col-3 col-form-label">Title</label>
        <div class="col">
            <input type="text" class="form-control" placeholder="Enter Title" name="title" />
        </div>
    </div>


    <div class="form-group mb-3 row">
        <label class="form-label col-3 col-form-label">Url</label>
        <div class="col">
            <input type="text" class="form-control" placeholder="Enter url" name="url" />
        </div>
    </div>


    <div class="form-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    @csrf
</form>
