<!doctype html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>P.M.S Cam Login</title>
	<link rel="stylesheet" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<style type="text/css">
		body { font-family: Helvetica, sans-serif; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
		#results { float:right; margin:20px; padding:20px; border:1px solid; background:#3C8DBC; color: #fff; }
		#dismiss { float: right; }
	</style>
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
          <!-- <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </a> -->
          <div class="navbar-right">
              <ul class="nav navbar-nav">
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <!-- <i class="glyphicon glyphicon-user"></i> -->
                          <!-- <span>
                              @if (Auth::check()) 
                                  @if (isset(Auth::user()->userinformation->firstname) && Auth::user()->userinformation->firstname != "")
                                      {{ substr(Auth::user()->userinformation->firstname, 0, 1) . ". " . Auth::user()->userinformation->lastname }} 
                                  @else 
                                      {{ Auth::user()->email }}
                                  @endif
                              @endif
                          <i class="caret"></i></span> -->
                      </a>
                      <ul class="dropdown-menu">
                          <!-- User image -->
                          <li class="user-header bg-light-blue">
                              <!-- <img src="{{ asset("img/avatar5.png") }}" class="img-circle" alt="User Image" />
                              <p>
                                  @if (Auth::check()) 
                                      @if (isset(Auth::user()->userinformation->firstname) && Auth::user()->userinformation->firstname != "")
                                          {{ Auth::user()->userinformation->firstname . " " . Auth::user()->userinformation->lastname }} 
                                      @else 
                                          {{ Auth::user()->email }}
                                      @endif
                                  @endif
                              </p> -->
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
	<div id="results" style="display:none;"></div>
	
	<div class="container">
	
		<h1>P.M.S. Cam Login</h1>
		
		<div id="my_camera" style="width:320px; height:240px;"></div>
		
		<!-- First, include the Webcam.js JavaScript Library -->
		<script type="text/javascript" src="{{ asset('js/webcam.js') }}"></script>
		
		<!-- Configure a few settings and attach camera -->
		<script language="JavaScript">
			Webcam.set({
				image_format: 'jpeg',
				jpeg_quality: 90
			});
			Webcam.attach( '#my_camera' );
		</script>
		
		<!-- A button for taking snaps -->
		<div style="width: 320px; margin-top: 10px; font-weight: bold;">
			<span id="clock" style="float: left;"></span> <span id="fulldate" style="float: right;"></span>
		</div>
		<br style="margin:0; padding:0; clear: both;">
		<form id="captureForm">
			<input type="text" class="form-control" style="width:110px; float: left;" id="userId" name="userId" placeholder="Employee ID">
			<select name="rtype" id="rtype" class="form-control" style="width:140px; float: left; margin-right: 10px;">
				<option value="0">Time In</option>
				<option value="1">Time Out</option>
				<option value="2">Break In</option>
				<option value="3">Break Out</option>
			</select>
			<input type=button value="Capture" id="capture" onClick="take()" class="btn btn-default btn-flat">
		</form>

	</div>
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/moment.js') }}"></script>
	<script language="JavaScript">
		function take() {
			var currentTime = new Date();

		  var currentHours = currentTime.getHours();
		  var currentMinutes = currentTime.getMinutes();
		  var currentSeconds = currentTime.getSeconds();

		  // Compose the string for display
		  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;

			var data_uri = Webcam.snap();
			var transType = document.getElementById('rtype').value;
			var userId = document.getElementById('userId').value;
			var transTime = currentTimeString;
			var transDate = currentTime.getFullYear() + "-" + (currentTime.getMonth() + 1) + "-" + currentTime.getDate();
			Webcam.uploadPlus(data_uri, transType, userId, transTime, transDate, '/upload', function( code, text ) {
				var response = $.parseJSON(text);

				var logType = "";

				if (response.rtype == 0) {
					logType = "Time In";
			  } else if (response.rtype == 1) {
			  	logType = "Time Out";
			  } else if (response.rtype == 2) {
			  	logType = "Break In";
			  } else if (response.rtype == 3) {
			  	logType = "Break Out";
			  }

				// display results in page
				var imgDisplay = document.getElementById('results');
				imgDisplay.innerHTML = "";
				imgDisplay.innerHTML = 
					'<span id="dismiss"><i class="glyphicon glyphicon-remove-circle" onClick="clearLastImage()"></i> </span> <p>Thank you...</p>' + 
					'<center><img src="{{ asset("uploads") }}/'+ response.img_url +'" width="80%"/></center> <div style="width: 320px; margin-top: 10px; font-weight: bold;"><span style="float: left;">' + logType + ": " + response.rtime +'</span> <span style="float: right;">' + n + " " + d.getDate() + ", " + d.getFullYear(); +'</span></div>';
				imgDisplay.style.display = "block";

				var userInput = document.getElementById('userId');
				userInput.value = "";
				userInput.focus();
				// document.getElementById('captureForm').style.display = "none";
			});

		}	

		function take_snapshot() {
			// take snapshot and get image data
			var data_uri = Webcam.snap();

			var currentTime = new Date();

		  var currentHours = currentTime.getHours();
		  var currentMinutes = currentTime.getMinutes();
		  var currentSeconds = currentTime.getSeconds();

		  // Pad the minutes and seconds with leading zeros, if required
		  currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
		  currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

		  // Choose either "AM" or "PM" as appropriate
		  var timeOfDay = (currentHours < 12) ? "AM" : "PM";

		  // Convert the hours component to 12-hour format if needed
		  currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

		  // Convert an hours component of "0" to "12"
		  currentHours = (currentHours == 0) ? 12 : currentHours;

		  // Compose the string for display
		  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

		  var rtype = document.getElementById('rtype').value
		  var rtypeString = "";
		  
		  if (rtype == 0) {
		  	rtypeString = "Time In";
		  } else if (rtype == 1) {
		  	rtypeString = "Time Out";
		  } else if (rtype == 2) {
		  	rtypeString = "Break In";
		  } else if (rtype == 3) {
		  	rtypeString = "Break Out";
		  }

			
			// display results in page
			var imgDisplay = document.getElementById('results');
			imgDisplay.innerHTML = 
				'<span id="dismiss"><i class="fa fa-desktop" onClick="clearLastImage()"></i> </span> <p>Thank you...</p>' + 
				'<img src="'+data_uri+'"/> <div style="width: 320px; margin-top: 10px; font-weight: bold;"><span style="float: left;">' + rtypeString + ": " + currentTimeString +'</span> <span style="float: right;">' + n + " " + d.getDate() + ", " + d.getFullYear(); +'</span></div>';
			imgDisplay.style.display = "block";
			document.getElementById('captureForm').style.display = "none";

		}

		function clearLastImage() {
			var imgDisplay = document.getElementById('results');
			imgDisplay.innerHTML = "";
			imgDisplay.style.display = "none";
			document.getElementById('captureForm').style.display = "block";
		}

	function updateClock() {
	  var currentTime = new Date();

	  var currentHours = currentTime.getHours();
	  var currentMinutes = currentTime.getMinutes();
	  var currentSeconds = currentTime.getSeconds();

	  // Pad the minutes and seconds with leading zeros, if required
	  currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
	  currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

	  // Choose either "AM" or "PM" as appropriate
	  var timeOfDay = (currentHours < 12) ? "AM" : "PM";

	  // Convert the hours component to 12-hour format if needed
	  currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

	  // Convert an hours component of "0" to "12"
	  currentHours = (currentHours == 0) ? 12 : currentHours;

	  // Compose the string for display
	  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

	  // Update the time display
	  document.getElementById('clock').innerHTML = currentTimeString;

	}

	var d = new Date();
	var month = new Array();
	month[0] = "January";
	month[1] = "February";
	month[2] = "March";
	month[3] = "April";
	month[4] = "May";
	month[5] = "June";
	month[6] = "July";
	month[7] = "August";
	month[8] = "September";
	month[9] = "October";
	month[10] = "November";
	month[11] = "December";
	var n = month[d.getMonth()];

	window.onload = function () {
	  updateClock();
	  setInterval('updateClock()', 1000);

	  var fulldate = n + " " + d.getDate() + ", " + d.getFullYear();
	  document.getElementById("fulldate").textContent = fulldate;
	};
	</script>
	
</body>
</html>