<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta
* @link https://tabler.io
* Copyright 2018-2021 The Tabler Authors
* Copyright 2018-2021 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<?php
	$path = str_replace(BACKEND_PATH,'',Request()->path()); 
	// debug(Request()->path());
	// debug($path);
?>

<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{str_replace("_"," ",config('app.name'))}} @yield('title')</title>
    <!-- CSS files -->
	<link href="{{asset('template/tabler/dist/css/tabler.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('template/tabler/dist/css/tabler-flags.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('template/tabler/dist/css/tabler-payments.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('template/tabler/dist/css/tabler-vendors.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('addons/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" rel="stylesheet">
	<style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
	@yield('css')
	<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/> 
    <link href="{{asset('assets/css/backend.css')}}" rel="stylesheet"/>
	  <!-- #tinymce wysiwyg editor -->
<script src="{{ asset('template/tabler/dist/libs/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

</head>
<body class="antialiased @yield('body_class')">
@section('body')
	<div class="page">
		
		<!-- Header -->
		<header class="navbar navbar-expand-md d-print-none header-top-primary">
		<div class="container-fluid">
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
			<a href="{{url(BACKEND_PATH)}}">
			{{BACKEND_TITLE}}
			</a>
		  </h1>
		 
		 <div class="navbar-nav flex-row order-md-last">
			<div class="d-none d-md-flex">
			  <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
				<!-- Download SVG icon from http://tabler-icons.io/i/moon -->
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
			  </a>
			  <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
		   data-bs-placement="bottom">
				<!-- Download SVG icon from http://tabler-icons.io/i/sun -->
				<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
			  </a>
			  <div class="nav-item dropdown d-none d-md-flex me-3">
				<a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
				  <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
				  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
				  <span class="badge bg-red"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
				  <div class="card">
					<div class="card-header">
					  <h3 class="card-title">Last updates</h3>
					</div>
					<div class="list-group list-group-flush list-group-hoverable">
					  <div class="list-group-item">
						<div class="row align-items-center">
						  <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
						  <div class="col text-truncate">
							<a href="#" class="text-body d-block">Example 1</a>
							<div class="d-block text-muted text-truncate mt-n1">
							  Change deprecated html tags to text decoration classes (#29604)
							</div>
						  </div>
						  <div class="col-auto">
							<a href="#" class="list-group-item-actions">
							  <!-- Download SVG icon from http://tabler-icons.io/i/star -->
							  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
							</a>
						  </div>
						</div>
					  </div>
					  <div class="list-group-item">
						<div class="row align-items-center">
						  <div class="col-auto"><span class="status-dot d-block"></span></div>
						  <div class="col text-truncate">
							<a href="#" class="text-body d-block">Example 2</a>
							<div class="d-block text-muted text-truncate mt-n1">
							  justify-content:between ⇒ justify-content:space-between (#29734)
							</div>
						  </div>
						  <div class="col-auto">
							<a href="#" class="list-group-item-actions show">
							  <!-- Download SVG icon from http://tabler-icons.io/i/star -->
							  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
							</a>
						  </div>
						</div>
					  </div>
					  <div class="list-group-item">
						<div class="row align-items-center">
						  <div class="col-auto"><span class="status-dot d-block"></span></div>
						  <div class="col text-truncate">
							<a href="#" class="text-body d-block">Example 3</a>
							<div class="d-block text-muted text-truncate mt-n1">
							  Update change-version.js (#29736)
							</div>
						  </div>
						  <div class="col-auto">
							<a href="#" class="list-group-item-actions">
							  <!-- Download SVG icon from http://tabler-icons.io/i/star -->
							  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
							</a>
						  </div>
						</div>
					  </div>
					  <div class="list-group-item">
						<div class="row align-items-center">
						  <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
						  <div class="col text-truncate">
							<a href="#" class="text-body d-block">Example 4</a>
							<div class="d-block text-muted text-truncate mt-n1">
							  Regenerate package-lock.json (#29730)
							</div>
						  </div>
						  <div class="col-auto">
							<a href="#" class="list-group-item-actions">
							  <!-- Download SVG icon from http://tabler-icons.io/i/star -->
							  <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
							</a>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="nav-item dropdown">
			  <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
				<span class="avatar avatar-sm" style="background-image: url(https://i.pravatar.cc/150?img=5)"></span>
				<div class="d-none d-xl-block ps-2">
					<div>{{Request()->get('backend_user')->name??''}}</div>
					<div class="mt-1 small text-muted"></div>
				</div>
			  </a>
			  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
			   <!-- <a href="#" class="dropdown-item">Set status</a> -->
				<a href="{{url(BACKEND_PATH.'profile')}}" class="dropdown-item">Profile</a>
				<!-- <a href="#" class="dropdown-item">Feedback</a> -->
				<div class="dropdown-divider"></div>
				<!-- <a href="#" class="dropdown-item">Settings</a> -->
				<a href="{{url(BACKEND_PATH.'logout')}}" class="dropdown-item">Logout</a>
			  </div>
			</div>
		  </div>
		  
		  
		  <div class="collapse navbar-collapse" id="navbar-menu">
			<div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
			 <ul class="navbar-nav">
				
				<li class="nav-item  @if(in_array($path,['','/'])) active @endif ">
				  <a class="nav-link" href="{{url(BACKEND_PATH)}}" >
					<span class="nav-link-icon d-md-none d-lg-inline-block"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
					</span>
					<span class="nav-link-title">
					  Home
					</span>
				  </a>
				</li>
				
				<li class="nav-item dropdown  @if(in_array($path,['users'])) active @endif ">
				  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
					<span class="nav-link-icon d-md-none d-lg-inline-block">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
					</span>
					<span class="nav-link-title">
					  User
					</span>
				  </a>
				  <div class="dropdown-menu">
					<a class="dropdown-item" href="{{url(BACKEND_PATH.'users')}}" >
					  All users
					</a>
				  </div>
				</li>
				
				<li class="nav-item dropdown @if(in_array($path,['media','media.album'])) active @endif">
				  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
					<span class="nav-link-icon d-md-none d-lg-inline-block">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="15" y1="8" x2="15.01" y2="8" /><rect x="4" y="4" width="16" height="16" rx="3" /><path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" /><path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" /></svg>
					</span>
					<span class="nav-link-title">
					  Media
					</span>
				  </a>
				  <div class="dropdown-menu">
					<a class="dropdown-item" href="{{url(BACKEND_PATH.'media.album')}}" >Album</a>
					<a class="dropdown-item" href="{{url(BACKEND_PATH.'media')}}" >Media</a>
				  </div>
				</li>
				
				<li class="nav-item dropdown @if(in_array($path,['administrator.group','administrator.account'])) active @endif">
				  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
					<span class="nav-link-icon d-md-none d-lg-inline-block">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 12l2 2l4 -4" /><path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" /></svg>
					</span>
					<span class="nav-link-title">
					  Administrator
					</span>
				  </a>
				  <div class="dropdown-menu">
					<a class="dropdown-item" href="{{url(BACKEND_PATH.'administrator.group')}}" >Adm Group</a>
					<a class="dropdown-item" href="{{url(BACKEND_PATH.'administrator.account')}}" >Adm Accounts</a>
				  </div>
				</li>
				
				<li class="nav-item dropdown @if(in_array($path,['activity.log','backend.log','frontend.log'])) active @endif ">
				  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
					<span class="nav-link-icon d-md-none d-lg-inline-block">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="5" y="3" width="14" height="18" rx="2" /><line x1="9" y1="7" x2="15" y2="7" /><line x1="9" y1="11" x2="15" y2="11" /><line x1="9" y1="15" x2="13" y2="15" /></svg>
					</span>
					<span class="nav-link-title">
					  Logs
					</span>
				  </a>
				  <div class="dropdown-menu">
					<a class="dropdown-item" href="{{url(BACKEND_PATH.'activity.log')}}" >Activity</a>
					<a class="dropdown-item" href="{{url(BACKEND_PATH.'backend.log')}}" >BackEnd</a>
					<a class="dropdown-item" href="{{url(BACKEND_PATH.'frontend.log')}}" >FrontEnd</a>
				  </div>
				</li>
				
				<li class="nav-item">
				  <a class="nav-link" href="{{url(BACKEND_PATH.'tester')}}" target="_tester">
					<span class="nav-link-title"> Tester </span>
				  </a>
				</li>


				<li class="nav-item">
				  <a class="nav-link" href="{{url(BACKEND_PATH.'article')}}" target="_tester">
					<span class="nav-link-title"> Article </span>
				  </a>
				</li>

				<li class="nav-item">
				  <a class="nav-link" href="{{url(BACKEND_PATH.'navbar')}}" target="_tester">
					<span class="nav-link-title"> Navbar </span>
				  </a>
				</li>

				<!-- <a class="dropdown-item" href="{{url(BACKEND_PATH.'administrator.group')}}" >Adm Group</a> -->


				
			  </ul>
			  
				
		   </div>
		  </div>
		</div>
		</header>
		<!-- End: Header -->
		
		
		
		
		 <div class="page-wrapper">
		   
		   <!-- Page header -->
		   @section('page_header')
			<div class="page-header d-print-none">
			  <div class="container-fluid">
				<div class="row g-2 align-items-center">
				  <div class="col">
					<div class="page-pretitle">
						@yield('page_pretitle')
					</div>
					<h2 class="page-title">
					  @yield('page_title')
					</h2>
				  </div>
				  
					<!-- Page title actions -->
					<div class="col-auto ms-auto d-print-none">
						<div class="btn-list">
						  @yield('page_nav_button')
						</div>
					</div>
					<!-- End: Page title actions -->
					  
				</div>
			  </div>
			</div>
			@show
			
			<!-- Page body -->
			<div class="page-body">
			  <div class="container-fluid">
				<!-- Content here -->
				
					<!-- Show/Error message -->
					<div id="ajxForm_message"></div>
					@if (isset($errors) && $errors->any())
					<div class="alert alert-danger alert-important">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif				
					
					@if (session()->has('msg'))	<div class="alert alert-success">{{ session()->get('msg') }}</div>@endif					
					@if (session()->has('msgError'))<div class="alert alert-danger">{{ session()->get('msgError') }}</div>@endif
					
					@section('content')
					 
					@show
				
						
				
				<!-- End:Content here -->
			  </div>
			</div>
			<!-- End:Page body -->
			
			<!-- Footer -->
			<footer class="footer d-print-none">
				 <div class="container-fluid">
				<div class="row text-center align-items-center flex-row-reverse">
				  <div class="col-lg-auto ms-lg-auto">
					<ul class="list-inline list-inline-dots mb-0">
					<li class="list-inline-item">	
						<b>Domain</b> {{ request()->getHost() }} &nbsp;
						<b>/ App. Level</b> {{ env('APP_ENV') }} &nbsp;
						<b>/ Version</b> {{(config('app.app_version')?config('app.app_version'):' - ') }} &nbsp;
						<b>/ Load Time</b> in {{round((microtime(true) - LARAVEL_START),3)}}s &nbsp;
						<b>/ Your IP</b> {{request()->ip()}}

					</li>
					  
					  
					<?php /*
					  <li class="list-inline-item"><a href="#license.html" class="link-secondary">License</a></li>
					  <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
					*/ ?>
					</ul>
				  </div>
				  <div class="col-12 col-lg-auto mt-3 mt-lg-0">
					<ul class="list-inline list-inline-dots mb-0">
					  <li class="list-inline-item">
						Copyright &copy; 2023
						<a href="{{url(BACKEND_PATH)}}" class="link-secondary"><b>{{Request()->host()}}</b></a>.
						All rights reserved.
					  </li>
					  <!--
					  <li class="list-inline-item">
						<a href="#" class="link-secondary" rel="noopener">v1.0.0-beta</a>
					  </li>
					  -->
					</ul>
				  </div>
				</div>
			  </div>
			</footer>
			<!-- End:Footer -->
		
		</div>
		<!-- End:page-wrapper -->	
	
	</div>
	<!-- End:page -->	

	<!-- Modal -->
	<div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">		  		  
		  <div class="modal-header">
			<h5 class="modal-title">@yield('modal_title')</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>		  
		  <div class="modal-body">
			<div id="modal-message"></div>
			<div class="modal_content">
				<center><img id="img-loader" src="{{url('assets/svg/loading.svg')}}" height="40" alt="Loading.." /></center>
			</div>
		  </div>		  
		</div>
	  </div>
	</div>
	
	@show
	<script src="{{asset('assets/js/jquery_3.6.0.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Tabler Core -->
    <script src="{{asset('template/tabler/dist/js/tabler.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.form.min.js')}}"></script>	
	<script src="{{asset('addons/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
	<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
	
	@yield('js')
    <script src="{{asset('assets/js/backend.js')}}"></script>
   @stack('js')
  </body>
</html>