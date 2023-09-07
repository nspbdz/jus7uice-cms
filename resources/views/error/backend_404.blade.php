@extends('layout.backend')


@section('page_pretitle')
@endsection

@section('page_title')
@endsection

@section('page_nav_button')
@endsection

@section('content')

	
		  
	<div class="flex-fill d-flex align-items-center justify-content-center">
      <div class="container py-6">
		<div class="row justify-content-center">
			<div class="col-6">
				<div class="empty">
				  <div class="empty-img"><img src="{{asset('template/tabler/static/illustrations/undraw_sign_in_e6hj.svg')}}" height="128"  alt="">
				  </div>
				  <p class="empty-title">Page not Available</p>
				  <p class="empty-subtitle text-muted">
					<b><em>{{Request()->fullUrl()}}</em></b><br /><br />
					Your Administrator has limited Access to some area of this app, and the page you tried to access is not availabe. Please contact your administrator for more Information.
				  </p>
				  
				</div>
			</div>
        </div>
      </div>
    </div>
		  
          
	
@endsection