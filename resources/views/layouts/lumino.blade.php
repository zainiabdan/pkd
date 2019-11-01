<!DOCTYPE html>
<html lang="en">
 	<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
		
		<link rel="shortcut icon" href="{{ URL::asset('kalsel.ico') }}" type="image/x-icon" />
		<!-- Bootstrap core CSS -->
		<link href="{{ URL::asset('assets/lumino-admin/css/bootstrap.min.css') }}" rel="stylesheet">
		{{-- <link href="{{ URL::asset('assets/lumino-admin/css/datepicker3.css') }}" rel="stylesheet"> --}}
		<link href="{{ URL::asset('assets/lumino-admin/css/datatables.min.css') }}"  rel="stylesheet" >
		<link href="{{ URL::asset('assets/lumino-admin/css/responsive.dataTables.min.css') }}"  rel="stylesheet" >

  		<link href="{{ URL::asset('assets/css/plugins/jquery.datetimepicker.css') }}" rel="stylesheet">
		{{-- <link href="{{ URL::asset('assets/lumino-admin/css/clockpicker.css') }}"  rel="stylesheet"> --}}
		<link href="{{ URL::asset('assets/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/lumino-admin/css/ekko-lightbox.css') }}"  rel="stylesheet" >
		
		<link href="{{ URL::asset('assets/lumino-admin/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/lumino-admin/css/styles.css') }}" rel="stylesheet">

	    <!--Custom Font-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

		
		{{-- <link  rel="stylesheet" href="{{ URL::asset('assets/lumino-admin/css/datatables.min.css') }}" >
		<link  rel="stylesheet" href="{{ URL::asset('assets/lumino-admin/css/responsive.dataTables.min.css') }}" >
		<link  rel="stylesheet" href="{{ URL::asset('assets/lumino-admin/css/jquery.dataTables.min.css') }}" > --}}
	
		@yield('tscript')

	</head>
	<body>

		

        <!-- Static navbar -->
		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button  type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span></button>
						
					<a class="navbar-brand" href="#"><span>ADMIN</span> : PKD</a>
						<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
						</a>
							<ul class="dropdown-menu dropdown-messages">
								<li>
									<div class="dropdown-messages-box"><a href="{{ url('/profile.htm') }}" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
										</a>
										<div class="message-body"><small class="pull-right">3 mins ago</small>
											<a href="{{ url('/#') }}"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
										<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="dropdown-messages-box"><a href="{{ url('/profile.html') }}" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
										</a>
										<div class="message-body"><small class="pull-right">1 hour ago</small>
											<a href="{{ url('/#') }}">New message from <strong>Jane Doe</strong>.</a>
										<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="all-button"><a href="{{ url('/#') }}">
										<em class="fa fa-inbox"></em> <strong>All Messages</strong>
									</a></div>
								</li>
							</ul>
						</li>
						<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-bell"></em><span class="label label-info">5</span>
						</a>
							<ul class="dropdown-menu dropdown-alerts">
								<li><a href="{{ url('/#') }}">
									<div><em class="fa fa-envelope"></em> 1 New Message
										<span class="pull-right text-muted small">3 mins ago</span></div>
								</a></li>
								<li class="divider"></li>
								<li><a href="{{ url('/#') }}">
									<div><em class="fa fa-heart"></em> 12 New Likes
										<span class="pull-right text-muted small">4 mins ago</span></div>
								</a></li>
								<li class="divider"></li>
								<li><a href="{{ url('/#') }}">
									<div><em class="fa fa-user"></em> 5 New Followers
										<span class="pull-right text-muted small">4 mins ago</span></div>
								</a></li>
							</ul>
						</li>
					</ul> 
				</div>
			</div><!-- /.container-fluid -->
		</nav>

		<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

		
				<div class="profile-sidebar">
					<div class="profile-userpic">
						<img src="{{ Storage::url(Auth::user()->foto_profil ?? '') }}" class="img-responsive" alt="">
					</div>
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">{{ Auth::user()->name ?? '' }}</div>
						<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="divider"></div>
				
				<form role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
				</form> 


				<ul class="nav menu">

					@if(Auth::check() && Auth::user()->hasRole('superadmin'))
					<li class="parent"><a data-toggle="collapse" href="#sub-item-1">
						<em class="fa fa-navicon">&nbsp;</em> Menu Admin <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
						</a>
							<ul class="children collapse sublist" id="sub-item-1">
								<li><a href="{{ url('/user') }}">
									<span class="fa fa-arrow-right">&nbsp;</span>Daftar User
								</a></li>
							</ul>
						</li>
					@endif

					<li ><a href="{{ url('/') }}"><em class="fa fa-home">&nbsp;</em>Beranda</a></li>

					<li {{ request()->is('dashboard') ? ' class=active' : '' }}><a href="{{ url('/dashboard') }}"><em class="fa fa-dashboard">&nbsp;</em>Dashboard</a></li>



					
					
				
					<li {{ request()->is('transactions*') ? ' class=active' : '' }}>
						<a href="{{ url('/transactions/') }}"><em class="fa fa-file-text">&nbsp;</em>Pesanan</a>
					</li>
				
					<li {{ request()->is('vehicles*') ? ' class=active' : '' }} >
						<a href="{{ url('/vehicles') }}"><em class="fa fa-car">&nbsp;</em>Kendaraan</a>
					</li>

					<li {{ request()->is('types*') ? ' class=active' : '' }} >
						<a href="{{ url('/types') }}"><em class="fa fa-file">&nbsp;</em>Tipe Kendaraan</a>
					</li>
					
					<li {{ request()->is('instansi*') ? ' class=active' : '' }} >
						<a href="{{ url('/instansi') }}"><em class="fa fa-building ">&nbsp;</em>Instansi</a>
					</li>

					<li {{ request()->is('driver*') ? ' class=active' : '' }} >
						<a href="{{ url('/driver') }}"><em class="fa fa-id-card">&nbsp;</em>Sopir</a>
					</li>

				
						{{-- <li><a href="{{ url('/widgets.html') }}"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
						<li><a href="{{ url('/charts.html') }}"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
						<li><a href="{{ url('/elements.html') }}"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
						<li><a href="{{ url('/panels.html') }}"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>  --}}
{{-- 
					<li class="parent "><a data-toggle="collapse" href="#s">
						<em class="fa fa-navicon">&nbsp;</em> Surat <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
						</a>
						<ul class="children collapse sublist" id="s">
							<li id="sm" {{ request()->is('') ? ' class=active' : '' }}>
								<a href="{{ url('/suratmasuk/index') }}">
									<span class="fa fa-arrow-right">&nbsp;</span> Surat Masuk
								</a>
							</li>

							<li id="sk" {{ request()->is('') ? ' class=active' : '' }}>
								<a href="{{ url('/suratkeluar/index') }}">
									<span class="fa fa-arrow-right">&nbsp;</span> Surat Keluar
								</a>
							</li>
						</ul>
					</li> --}}
				<li>
						<a class="fa fa-sign-out" href="{{ route('logout') }}"
						onclick="event.preventDefault();
										document.getElementById('logoutform').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
				</li>
			</ul>
		</div><!--/.sidebar-->



        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">
                    <em class="fa fa-home"></em>
                </a></li>
                <li id='dir' class="active"></li>
                </ol>
            </div><!--/.row-->
            
            <div class="row">
                <div class="col-lg-12">
                <h1 id='page-header' class="page-header"></h1>
                </div>

            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
					<!-- flash message -->
					@if ($message = Session::get('success'))
					<div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check ">&nbsp;</em>{{ $message }}<a href="#" class="pull-right"><button type="button" class="close" data-dismiss="alert">×</button></a></div>
					@endif
				
					@if ($message = Session::get('error'))
					<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-exclamation ">&nbsp;</em>{{ $message }}<a href="#" class="pull-right"><button type="button" class="close" data-dismiss="alert">×</button></a></div>
					@endif
				
					@if ($message = Session::get('warning'))
					<div class="alert bg-warning" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>{{ $message }}<a href="#" class="pull-right"><button type="button" class="close" data-dismiss="alert">×</button></a></div>
					@endif
				
					@if ($message = Session::get('info'))
					<div class="alert bg-info" role="alert"><em class="fa fa-lg fa-info">&nbsp;</em>{{ $message }}<a href="#" class="pull-right"><button type="button" class="close" data-dismiss="alert">×</button></a></div>
					@endif
                </div>
            </div>


            <div  class="row">
				@yield('container')
				
				<div class="col-sm-12">
					<p class="back-link">Lumino Theme by <a href="https://www.medialoot.com">Medialoot</a></p>
				</div>
            </div>

		
         
		</div> <!-- /main -->
		


		<script src="{{ URL::asset('assets/lumino-admin/js/jquery-3.3.1.js') }}"></script>
		<script src="{{ URL::asset('assets/lumino-admin/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('assets/lumino-admin/js/chart.min.js') }}"></script>
		{{--  <script src="{{ URL::asset('assets/lumino-admin/js/chart-data.js') }}"></script> 
		 <script src="{{ URL::asset('assets/lumino-admin/js/easypiechart.js') }}"></script>
		<script src="{{ URL::asset('assets/lumino-admin/js/easypiechart-data.js') }}"></script>  --}}
		{{-- <script src="{{ URL::asset('assets/lumino-admin/js/bootstrap-datepicker.js') }}"></script> --}}

		
		<script src="{{ URL::asset('assets/lumino-admin/js/datatables.min.js') }}"></script>

		<script src="{{ URL::asset('assets/lumino-admin/js/dataTables.responsive.min.js') }}"></script>


    	<script src="{{ URL::asset('assets/js/plugins/jquery.datetimepicker.full.min.js') }}"></script>
		{{-- <script src="{{ URL::asset('assets/lumino-admin/js/clockpicker.js') }}"></script> --}}
		<script src="{{ URL::asset('assets/lumino-admin/js/ekko-lightbox.js') }}"></script>
		
	    <script src="{{ URL::asset('assets/fullcalendar/moment.min.js') }}"></script>
		<script src="{{ URL::asset('assets/fullcalendar/fullcalendar.js') }}"></script>
		<script src="{{ URL::asset('assets/fullcalendar/id.js') }}"></script>
		
		<script src="{{ URL::asset('assets/lumino-admin/js/custom.js') }}"></script> 

		<script src="{{ URL::asset('assets/lumino-admin/js/sha512.js') }}"></script>
		<script src="{{ URL::asset('assets/lumino-admin/js/forms.js') }}"></script>
		<script src="{{ URL::asset('assets/lumino-admin/main.js') }}"></script>

		
		<script>
			$(document).on('click', '[data-toggle="lightbox"]', function(event) {
				event.preventDefault();
				$(this).ekkoLightbox();
			});
		</script>

		@php  echo ' 
		<script>
		document.getElementById("dir").innerHTML="';
		echo isset($dir) ? $dir : '' ;
		echo '"</script>';
		@endphp


		@php  echo ' 
		<script>
		document.getElementById("page-header").innerHTML="';
		echo isset($headerPage) ? $headerPage : '' ;
		echo '"</script>';
		@endphp


		@yield('dscript')

	</body>

</html>