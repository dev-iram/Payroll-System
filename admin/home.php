<?php
session_start(); //must be on all pages where cookies will be saved !
include('GuidFunctions.php');
include('DatabaseConnection.php');
$dbConn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
$myRole = $_SESSION["loggedinRole"];
$mx=0;
?>

<?php

echo'<!DOCTYPE HTML> ';
echo'<html>';
echo'	<head>';
echo'		<title>Home | Global Tour Operators</title>';
echo'		<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
echo'		<meta name="description" content="" />';
echo'		<meta name="keywords" content="" />';
echo' <link rel="stylesheet" href="css/button.css" type="text/css" media="all" />';
	
echo'	<link rel="icon" type="image/png" href="images/icons/icon.ico"/>';
echo'		<script src="js/jquery.min.js"></script>';
echo'		<script src="js/skel.min.js"></script>';
echo'	<script src="js/skel-layers.min.js"></script>';
echo'		<script src="js/init.js"></script>';
echo'		<script src="js/main.js"></script>';
echo'		<noscript>';
echo'		<link rel="stylesheet" href="css/skel.css" />';
echo'			<link rel="stylesheet" href="css/style1.css" />';
echo'			<link rel="stylesheet" href="css/style-xlarge.css" />';
echo'		</noscript>';
echo'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
echo'<style>';
echo'

table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }
  
  th, td {
    text-align: left;
    padding: 16px;
  }
  /* Tooltip container */
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
  }
  
  /* Tooltip text */
  .tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
  
    /* Position the tooltip text */
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
  
    /* Fade in tooltip */
    opacity: 0;
    transition: opacity 0.3s;
  }
  
  /* Tooltip arrow */
  .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
  }
  
  /* Show the tooltip text when you mouse over the tooltip container */
  .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
  }
  
  </style>';
echo'	</head>';
echo'	<body id="top">';



/* !!!!!!!! ----------------------------------------TOUR GUIDE ROLE ----------------------------------- !!!!!!!*/
if ($myRole == "tourguide") 
{
  echo'		<!-- Header -->';
  echo'			<header id="header" class="skel-layers-fixed">';
  echo'			<h1><a href="#">Global Tour Operators</a></h1>';
  echo'			<nav id="nav">';
  echo'				<ul>';
echo'					  <li><i class="fa fa-bookmark" aria-hidden="true">&nbsp;</i><a href="bookings.php?procedure=bookings">Bookings</a></li>';
echo'					  <li><i class="fa fa-eur" aria-hidden="true">&nbsp;</i><a href="payroll.php">Payroll</a></li>';
echo'						<li><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><a href="index.php?action=clean">Log Out</a></i>';
echo'						<li><a href="faqs.html" target="_blank" class="button special"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;FAQs</a></i>';
echo'				</ul>';
echo'				</nav>';
echo'		</header>';
}
/* !!!!!!!!--------------------------------------- ADMINISTRATOR ROLE------------------------------------!!!!!!!*/
if ($myRole == "admin") 
{
  
echo'		<!-- Header -->';
echo'			<header id="header" class="skel-layers-fixed">';
echo'			<h1><a href="#">Global Tour Operators</a></h1>';
echo'			<nav id="nav">';
echo'				<ul>';
echo'					  <li><i class="fa fa-home" aria-hidden="true">&nbsp;</i><a href="home.php">Home</a></li>';
echo'					  <li><i class="fa fa-location-arrow" aria-hidden="true">&nbsp;</i><a href="tours.php">Tours</a></li>';
echo'					  <li><i class="fa fa-users" aria-hidden="true"></i>&nbsp;<a href="tourguides.php">Tour Guides</a></li>';
echo'					  <li><i class="fa fa-bookmark" aria-hidden="true">&nbsp;</i><a href="bookings.php?procedure=bookings">Bookings</a></li>';
echo'						<li><i class="fa fa-percent" aria-hidden="true">&nbsp;</i><a href="commissions.php">Commissions</a></li>';
echo'					  <li><i class="fa fa-eur" aria-hidden="true">&nbsp;</i><a href="payroll.php">Payroll</a></li>';
echo '          <li><i class="fa fa-sliders" aria-hidden="true">&nbsp;</i><a href="setup.php">Setup</a></li>';
echo'						<li><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><a href="index.php?action=clean">Log Out</a></i>';
echo'						<li><a href="faqs.html" target="_blank" class="button special"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;FAQs</a></i>';
echo'				</ul>';
echo'				</nav>';
echo'		</header>';
}


echo'		<!-- Banner -->';
echo'			<section id="banner">';
echo'				<div class="inner">';
echo'					<h2>Global Tour Operators</h2>';
echo'				<p>Experts in Global Tour Operations</p>';
echo'				<!--<ul class="actions">';
echo'				<li><a href="#content" class="button big special">Sign Up</a></li>';
echo'					<li><a href="#elements" class="button big alt">Learn More</a></li>';
echo'				</ul>-->';
echo'				</div>';
echo'		</section>';


if ($myRole == "") {

  echo'			<header id="header" class="skel-layers-fixed">';
  echo'			<h1><a href="#">Global Tour Operators</a></h1>';
  echo'			<nav id="nav">';
  echo'				<ul>';
  //echo'					<li><a href="http://iram.innovador-ie.com/bookings.php"> < Cancel</a></li>';
  echo'	<li><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><a href="index.php">Log In</a></i>';
  echo'						<li><a href="faqs.html" target="_blank" class="button special"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;FAQs</a></i>';
  echo'				</ul>';
  echo'				</nav>';
  echo'		</header>';

echo'				<header class="major">';
  echo'			<div class="container">';
  echo "<h1><br><b>Error 002: You do not have permission to access this page. Please login.</h1></b>"; 
  echo ' <script>';
echo ' function LoginProcedure() {';
echo '   location.href = "index.php";';
echo ' }';
echo ' </script>';

//echo '<br><br><a href="bookings.php?myprocedure=Hello">Hello World</a>';
//echo '<button class="btn1">SUBMIT</button>';

echo'<button onclick="LoginProcedure()" type="button" class="btn1">Staff Login</button><br><br>';
echo'</div>';
}




if ($myRole == "admin") {
//LOGGED IN NAME AND ROLE OF THE USER
echo "<h1><br>Welcome <b>".$_SESSION["loggedinName"]."</b>, <br>You are logged in as:<b> ".$_SESSION["loggedinRole"]."</b> </h1>";


echo'		<section id="one" class="wrapper style1">';
echo'				<header class="major">';
echo'				<h2>Home</h2>';
echo'				<p>Please select an option in order to proceed.</p>';
echo'			</header>';
echo'			<div class="container">';
echo'				<div class="row">';
echo'				<div class="4u">';
echo'                            <section class="special box">';
echo'							<i class="icon fa-home major"></i>';
echo'							<h3>Home</h3>';
echo'							<p>Global Tour Operators Homepage.</p>';
echo'                               <a href="home.php"> <button class="btn1">HOME</button></a><BR><BR>';
echo'						</section>';
echo'					</div>';
echo'					<div class="4u">';
echo'						<section class="special box">';
echo'						<i class="icon fa-refresh major"></i>';
echo'						<h3>Tours</h3>';
echo'						<p>Create, View, Update and Delete Tours</p>';
echo'                               <a href="tours.php"> <button class="btn1">TOURS</button></a><BR><BR>';
echo'					</section>';
echo'				</div>';
echo'					<div class="4u">';
echo'                  				<section class="special box">';
echo'						<i class="icon fa-cog major"></i>';
echo'							<h3>Tour Guides</h3>';
echo'						<p>Create, View, Update and Delete Tour Guides</p>';
echo'                               <a href="tourguides.php"> <button class="btn1">TOUR GUIDES</button></a>';
echo'						</section>';
echo'					</div>';


echo' <div class="4u">';
echo'                            <section class="special box">';
echo'							<i class="icon fa-home major"></i>';
echo'							<h3>Commission</h3>';
echo'							<p>Create, View, Update and Delete Commissions<br></p>';
echo'                               <a href="commissions.php"> <button class="btn1">COMMISSIONS</button></a>';
echo'						</section>';
echo'					</div>';
echo'					<div class="4u">';
echo'						<section class="special box">';
echo'						<i class="icon fa-refresh major"></i>';
echo'						<h3>Payroll</h3>';
echo'						<p>Create, View, Update and Delete Payroll (Admin) | View Payroll </p>';
echo'                               <a href="payroll.php"> <button class="btn1">PAYROLL</button></a>';
echo'					</section>';
echo'				</div>';
echo'					<div class="4u">';
echo'                  				<section class="special box">';
echo'						<i class="icon fa-cog major"></i>';
echo'							<h3>Bookings</h3>';
echo'						<p>Create, View, Update and Delete Bookings</p>';
echo'                               <a href="bookings.php"> <button class="btn1">BOOKINGS</button></a><br><br>';
echo'						</section>';
echo'					</div>';



 echo'				<div class="4u">';
 echo'                            <section class="special box">';
 echo'							<i class="icon fa-home major"></i>';
 echo'							<h3>System Setup</h3>';
 echo'							<p>Allocating rates for Tax and Flat Rates.</p>';
 echo'                               <a href="setup.php?procedure=systemsetup"> <button class="btn1">System Setup</button></a><BR>';
 echo'						</section>';
 echo'					</div>';
 echo'					<div class="4u">';
 echo'						<section class="special box">';
 echo'						<i class="icon fa-refresh major"></i>';
 echo'						<h3>Surcharge Set Up</h3>';
 echo'						<p>Create, Edit and View Surcharges</p>';
 echo'                               <a href="setup.php?procedure=surchargesetup"> <button class="btn1">Surcharge Set Up</button></a>';
 echo'					</section>';
 echo'				</div>';
 echo'					<div class="4u">';
 echo'                  				<section class="special box">';
 echo'						<i class="icon fa-cog major"></i>';
 echo'							<h3>User Set Up</h3>';
 echo'						<p>Create,Edit and View Users</p>';
 echo'                               <a href="setup.php?procedure=usersetup"> <button class="btn1">User Set Up</button></a>';
 echo'						</section>';
 echo'					</div>';
/*---------------------------------------------------*/
echo'				</div>';
echo'			</div>';
echo'			</section>';

}



if ($myRole == "tourguide") {

  //LOGGED IN NAME AND ROLE OF THE USER
echo "<h1><br>Welcome <b>".$_SESSION["loggedinName"]."</b>, <br>You are logged in as:<b> ".$_SESSION["loggedinRole"]."</b> </h1>";

  echo'		<section id="one" class="wrapper style1">';
  echo'				<header class="major">';
  echo'				<h2>Home</h2>';
  echo'				<p>Please select an option in order to proceed.</p>';
  echo'			</header>';
  echo'			<div class="container">';
  echo'				<div class="row">';
  echo'				<div class="4u">';
  echo'                            <section class="special box">';
  echo'							<i class="icon fa-home major"></i>';
  echo'							<h3>Home</h3>';
  echo'							<p>Global Tour Operators Homepage.</p>';
  echo'                               <a href="home.php"> <button class="btn1">HOME</button></a><BR><BR>';
  echo'						</section>';
  echo'					</div>';
  echo'					<div class="4u">';
  echo'                  				<section class="special box">';
  echo'						<i class="icon fa-cog major"></i>';
  echo'							<h3>Bookings</h3>';
  echo'						<p>Create, View, Update and Delete Bookings</p>';
  echo'                               <a href="bookings.php"> <button class="btn1">BOOKINGS</button></a><br><br>';
  echo'						</section>';
  echo'					</div>';
  echo'					<div class="4u">';
  echo'						<section class="special box">';
  echo'						<i class="icon fa-refresh major"></i>';
  echo'						<h3>Payroll</h3>';
  echo'						<p>Create, View, Update and Delete Payroll (Admin) | View Payroll </p>';
  echo'                               <a href="payroll.php"> <button class="btn1">PAYROLL</button></a>';
  echo'					</section>';
  echo'				</div>';

  echo'				</div>';
echo'			</div>';
echo'			</section>';
}




	
echo'	<!-- Footer -->';
echo'		<footer id="footer">';
echo'			<div class="container">';
					
							
									
echo'			<ul class="copyright">';
echo'				<li>&copy; Global Tour Operators 2020. All rights reserved.</li>';
			
echo'			</ul>';
echo'		</div>';
echo'		</footer>';

echo'</body>';
echo'</html>';
?>