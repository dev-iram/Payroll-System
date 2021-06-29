<?php
session_start(); //must be on all pages where cookies will be saved !

include('GuidFunctions.php');
include('DatabaseConnection.php');
$dbConn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);


$procedure = $_REQUEST["procedure"];

if ($procedure =="loggingin")
{

//$Username = mysqli_real_escape_string ($_REQUEST["Username"]);
//$Password = mysqli_real_escape_string ($_REQUEST["Password"]);

$Username = ($_REQUEST["Username"]);
$Password = ($_REQUEST["Password"]);

	//echo' "trying to login brooo"';
	$query = "SELECT * FROM Users WHERE Username = '".$Username."' AND Password='".$Password."'";
	$DataTable = mysqli_query($dbConn, $query);
	while ($Rows = mysql_fetch_assoc($DataTable))
	{
		$_SESSION["loggedinRole"] = $Rows["Role"];
		$_SESSION["loggedinGuid"] = $Rows["Guid"]; 
		$_SESSION["tourguideGuid"] = $Rows["TourGuide_Guid"];
		$_SESSION["loggedinName"] = $Rows["UserFullName"];
	}
	

 if ($_SESSION["loggedinGuid"]<>"")
 {
	 echo '<meta http-equiv="refresh" content="0;url=home.php">';
 }

}

echo '<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Global Tour Operators</title>
	<meta charset="UTF-8">

	<!-- STYLESHEETCSS -->
<link rel="stylesheet" href="css/button.css" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/icon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>';

echo '<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					
					<span class="login100-form-title p-b-43">
						Staff Login
					</span>';
					


					//<form class="login100-form validate-form">


/*
					echo 'This is my Login Page';


					echo '<center><form name="" action="index.php?action=triedtologin" method="post">';
					echo '<br>Username<br> <input name="Name" type="text" value="">';
					echo '<br>Password<br> <input name="Name" type="text" value="">';
					echo'</form>';
					
					
					echo '<a href="home.php?procedure=home">I have Loggged in!</a></center>';
					
					-->

*/






			echo '<form name="" action="index.php?procedure=loggingin" method="post">';

				echo '	
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="Username"  required  >
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="Password" required >
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							
							</label>
						</div>

						<div>
							<a href="home.php?procedure=home" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
					<!----	<button class="login100-form-btn">
							Login
						</button> -->
						<button class="btn1">SUBMIT</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or go back to homepage..
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="http://www.iram.innovador-ie.com/index.html" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-home" aria-hidden="true"></i>
						</a>

						
					</div>
				</form>';

			echo'	<div class="login100-more" style="background-image: url(images/bg-01.jpg);">
				</div>
			</div>
		</div>
	</div>';
	
	

	
	echo'</body>
	</html>
	';
// <!--===============================================================================================-->
// 	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
// <!--===============================================================================================-->
// 	<script src="vendor/animsition/js/animsition.min.js"></script>
// <!--===============================================================================================-->
// 	<script src="vendor/bootstrap/js/popper.js"></script>
// 	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
// <!--===============================================================================================-->
// 	<script src="vendor/select2/select2.min.js"></script>
// <!--===============================================================================================-->
// 	<script src="vendor/daterangepicker/moment.min.js"></script>
// 	<script src="vendor/daterangepicker/daterangepicker.js"></script>
// <!--===============================================================================================-->
// 	<script src="vendor/countdowntime/countdowntime.js"></script>
// <!--===============================================================================================-->
	

// </body>
// </html>'; //<script src="js/main.js"></script>
?>