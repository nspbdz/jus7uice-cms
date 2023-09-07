@extends('layout.backend')


@section('body_class')
border-top-wide border-primary d-flex flex-column
@endsection

@section('body')

	 <div class="flex-fill d-flex flex-column justify-content-center py-4">
      <div class="container-tight py-6">
        <div class="text-center mb-4">
			<h1><a href="#">{{BACKEND_TITLE}}</a></h1>		  
		  
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			
			@if (session('msg'))
			<div class="alert alert-success">
				{{ session('msg') }}
			</div>
			@endif
		  
        </div>
        <form class="card card-md" action="" method="post" autocomplete="on">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Enter username">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
                <?php /*
				<span class="form-label-description">
                  <a href="./forgot-password.html">I forgot password</a>
                </span>
				*/?>
              </label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control" name="password" placeholder="Password"  autocomplete="off">                
              </div>
            </div>
           
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
		  {{csrf_field()}}
        </form>       
      </div>
    </div>
		  
		  
		  
          
	
@endsection