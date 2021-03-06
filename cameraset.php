<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<style>
.tooltip {
    position: relative;
    display: inline-block;
}
.value {
    position: relative;
    display: inline-block;
	padding: 10px;
	margin: auto;
	text-align: center;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 200px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    top: 150%;
    left: 50%;
    margin-left: -100px;
}
.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    bottom: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: transparent transparent black transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;

</style>
<script type='text/javascript' > 
//Building global var
  var devIDlist = [];
  var HubIDG = "";
  var camID = "<?php echo $_GET['camID']; ?>";
  var camMac = "";
</script>
<script data-require="moment.js@2.10.2" data-semver="2.10.2" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<link rel="icon" type="image/png" href="images/favicon.png" />
<html>
	<head>
		<title>Iris Web Portal | Camera Settings</title>
		<meta charset="utf-8" />
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<META HTTP-EQUIV="Expires" CONTENT="-1">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="assets/js/connect.js?v=134"></script>
		<script src="assets/js/eventwatcher.js?v=134"></script>
		<script src="assets/js/cameraSet.js?v=134"></script>
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo">Iris Web Portal <strong><div id="portalVer"></div><div id="fmVer"></div></strong></a>
									
									<div class="select-wrapper">
									<select id="places" onchange="remember(this.selectedIndex);"></select>
									</div>
									<ul class="icons">
										<li><div id="portalCON"><i class="fa fa-connectdevelop" style="font-size:35px;color:orange"></i> <br> Starting</div></li>
									</ul>
								</header>
							
							<!-- Section -->
							<section>
									<header class="major">
										<h2>Local Live View</h2>
									</header>
									Local viewer only works on computer inside the same network as the camera.
									<br>
									<div id="LocalViewer">
									</div>
							</section>
							<!-- Section -->
								<section>
									<header class="major">
										<h2>Camera Settings</h2>
									</header>
									<div class="6u$">
									Camera Resolution
										<div class="select-wrapper">
											<select name="resolution" id="resolution">
												<option value="160x120">Loading....</option>
											</select>
										</div>
									</div>
									<br>
									<div class="6u$">
									Camera Quality
										<div class="select-wrapper">
											<select name="quality" id="quality">
												<option value="Very low">Loading...</option>
											</select>
										</div>
									</div>
									<br>
									<div class="6u$">
									Camera Bitrate
										<div class="select-wrapper">
											<select name="bitrate" id="bitrate">
												<option value="32K">Loading....</option>
											</select>
										</div>
									</div>
									<br>
									<div class="6u$">
									Camera Framerate
										<div class="select-wrapper">
											<select name="framerate" id="framerate">
												<option value="1">Loading....</option>
											</select>
										</div>
									</div>
									<br>
									<a onclick="saveBasicSettings();" class="button">Save Basic Settings</a>
									<div id="BasicLoading"></div>
								</section>
								<!-- Section -->
								<section>
									<header class="major">
										<h2>Camera Advanced Settings</h2>
									</header>
									<b>*If error is found reloading the page should fix it.</b>
									<div class="6u$">
									The IR LED mode
										<div class="select-wrapper">
											<select name="IRLEDMODE" id="IRLEDMODE">
												<option value="AUTO">Loading...</option>
											</select>
										</div>
									</div>
									<br>
									<div class="6u$">
									The IR LED luminance, on a scale of 1 to 5.
										<div class="select-wrapper">
											<select name="LED-Luminance" id="LED-Luminance">
												<option value="5">Loading...</option>
											</select>
										</div>
									</div>
									<br>
									<div class="6u$">
									The motion detection mode of operation.
										<div class="select-wrapper">
											<select name="MDmode" id="MDmode">
												<option value="PIR">Loading...</option>
											</select>
										</div>
									</div>
									<br>
									<div class="6u$">
									The motion detection threshold, on a scale of 0 to 255
									<br>
									<input type="range" min="0" max="255" value="127" id="mdThreshold" onchange="showValue('mdThreshold');"> <span id="mdThresholdValue">default</span>
									</div>
									<br>
									<div class="6u$">
									The motion detection sensitivity, on a scale of 0 to 10.
									<br>
									<input type="range" min="0" max="10" value="6" id="mdSensitivity" onchange="showValue('mdSensitivity');"> <span id="mdSensitivityValue">default</span>
									</div>
									<canvas id="myCanvas" width="640" height="480">
									Your browser does not support the HTML5 canvas tag.
									</canvas>
									<br>
									<a onclick="saveAdvancedSettings();" class="button">Save Advanced Settings</a>
									<a onclick="camReboot();" class="button">Reboot Camera</a>
									<div id="AdvLoading"></div>
								</section>


						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">
							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
																				<li><a href="/">Homepage</a></li>
										<li><a href="history.html">History</a></li>
										<li><a href="switcheslights.html">Switches & Lights</a></li>
										<li><a href="controlpanel.html">Control Panel</a></li>
										<li><a href="energy.html">Energy</a></li>
										<li><a href="sensors.html">Sensors</a></li>
										<li><a href="keyfobs.html">KeyFobs</a></li>
										<li><a href="irrigation.html">Irrigation</a></li>
										<li>
											<span class="opener">Surveillance</span>
											<ul>
												<li><a href="cameras.html">Cameras</a></li>
												<li><a href="recordings.html">Recordings</a></li>
											</ul>
										</li>
										<li>
											<span class="opener">Climate</span>
											<ul>
												<li><a href="fancontrols.html">Fan Controls</a></li>
												<li><a href="thermostat.html">Thermostat(s)</a></li>
												<li><a href="temperature.html">Temperature</a></li>
											</ul>
										</li>
										<li><a href="rules.html">Rules</a></li>
										<li><a href="scenes.html">Scenes</a></li>
										<li>
											<span class="opener">Troubleshooting</span>
											<ul>
												<li><a href="batterylevel.html">Battery Level</a></li>
												<li><a href="signallevel.html">Signal level</a></li>
												<li><a href="devices.html">All Devices</a></li>
												<li><a href="eventlog.html">Event Log</a></li>
												<li><a href="hubinfo.html">Hub Info</a></li>
											</ul>
										</li>
										<li><a href="pair.html">Add Device</a></li>
										<li><a href="faq.html">FAQ</a></li>
										<li><a href="supporters.html">Supporters</a></li>
									</ul>
									<br>
									<input class="button small" type="button" value="Check for updates on portal" onclick="checkUpdate();">
									<p>
									<a href="devbox.html"><i class="fa fa-wrench"></i></a><br>
									<p>
									<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
									<input type="hidden" name="cmd" value="_s-xclick">
									<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
									">
									<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
									<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
									</form>
									<div class="alignleft">

								</nav>
							
							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Iris Web Portal. All rights reserved.  Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
	
</html>