<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>P.M.S</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="skin-blue">

	<!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                P.M.S.
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>
                                    @if (Auth::check()) 
                                        @if (Auth::user()->userinformation->firstname && Auth::user()->userinformation->firstname != "")
                                            {{ substr(Auth::user()->userinformation->firstname, 0, 1) . ". " . Auth::user()->userinformation->lastname }} 
                                        @else 
                                            {{ Auth::user()->email }}
                                        @endif
                                    @endif
                                <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="{{ asset("img/avatar5.png") }}" class="img-circle" alt="User Image" />
                                    <p>
                                        @if (Auth::check()) 
                                            @if (Auth::user()->userinformation->firstname && Auth::user()->userinformation->firstname != "")
                                                {{ Auth::user()->userinformation->firstname . " " . Auth::user()->userinformation->lastname }} 
                                            @else 
                                                {{ Auth::user()->email }}
                                            @endif
                                        @endif
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li> -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="/lock" class="btn btn-default btn-flat">Lock</a>
                                    </div>
                                    <div class="pull-right">
                                    {{ Form::open(array('route' => array('auth.destroy'), 'method' => 'delete', 'style' => 'display:inline-block;')) }}
                                        <button type="submit" href="{{ URL::route('auth.destroy') }}" class="btn btn-default btn-flat">Sign out</button>
                                    {{ Form::close() }}
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ asset("img/avatar5.png") }}" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>@if (Auth::check()) @if (Auth::user()->userinformation->firstname && Auth::user()->userinformation->firstname != "") {{ substr(Auth::user()->userinformation->firstname, 0, 1) . ". " . Auth::user()->userinformation->lastname }} @else {{ Auth::user()->email }} @endif @endif</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="/">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Profile</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/profile"><i class="fa fa-angle-double-right"></i> User Profile</a></li>
                                <li><a href="/employees"><i class="fa fa-angle-double-right"></i> Employee Details</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/timesheet">
                                <i class="fa fa-folder"></i> <span>Time Sheet</span>
                            </a>
                        </li>
                        <li>
                            <a href="/face">
                                <i class="fa fa-clock-o"></i> <span>DTR Upload</span>
                            </a>
                        </li>
                        <li>
                        	<a href="/departments">
                        		<i class="fa fa-building-o"></i> <span>Departments</span>
                        	</a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @section('panel')
                    @show
                    <!-- <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
                    </ol> -->
                </section>

                <!-- Main content -->
                <section class="content">

                	@yield('content')

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

	<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/moment.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
	<script src="{{ asset('js/AdminLTE/app.js') }}" type="text/javascript"></script>
	@yield('scripts')
</body>
</html>