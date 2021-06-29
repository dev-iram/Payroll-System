<?php
session_start(); //must be on all pages where cookies will be saved  and FIRST THING U CALL!¬!

include('GuidFunctions.php');
include('DatabaseConnection.php');
$dbConn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);




echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>'; 
echo '	<title>Login | Global Tour Operators</title>';
echo'	<link rel="icon" type="image/png" href="images/icons/icon.ico"/>';
echo' <link rel="stylesheet" href="css/button.css" type="text/css" media="all" />';#
echo'		<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
echo'<meta name="viewport" content="width=device-width, initial-scale=1">';
echo'		<meta name="description" content="" />';
echo'		<meta name="keywords" content="" />';
echo '	<meta charset="UTF-8">';
echo '	</div>';
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
?>
<style>

.box {
  
  width: 300px;
  height: 250px;
  padding: 25px;
  margin: 20px;
  max-width: 80%;
  height: 50%;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}


</style>
</head>
<body>

<?php




$procedure = $_REQUEST["procedure"];


$action = $_REQUEST["action"];

if ($action =="clean")
{

	$_SESSION["loggedinRole"] = "";
	$_SESSION["loggedinGuid"] = "";
	$_SESSION["tourguideGuid"] = "";
	$_SESSION["loggedinName"] = "";

}


if ($procedure =="LoginAttempt")
{

//$Username = mysqli_real_escape_string ($_REQUEST["Username"]);
//$Password = mysqli_real_escape_string ($_REQUEST["Password"]);

$Username = ($_REQUEST["Username"]);
$Password = ($_REQUEST["Password"]);


	$query = "SELECT * FROM Users WHERE Username = '".$Username."' AND Password='".$Password."'";
	$DataTable = mysqli_query($dbConn, $query);



	while ($Rows = mysqli_fetch_assoc($DataTable))
	{
		$_SESSION["loggedinRole"] = $Rows["Role"];
		$_SESSION["loggedinGuid"] = $Rows["Guid"]; 
		$_SESSION["tourguideGuid"] = $Rows["TourGuide_Guid"];
		$_SESSION["loggedinName"] = $Rows["UserFullName"];
	}


	echo "<hr>".$_SESSION["loggedinRole"] ;
	echo "<hr>".$_SESSION["loggedinName"];

	
//	echo $query;

//die();


			if ($_SESSION["loggedinGuid"]<>"")
			{
				echo '<meta http-equiv="refresh" content="0;url=home.php">';
			}
			else
			{

echo'				<header class="major">';
echo'				<h2>Error 001: Invalid Credentials</h2>';
echo'				<p>Wrong Username/Password</p>';
echo'			</header>';
			}
}




echo'			<header id="header" class="skel-layers-fixed">';
echo'			<h1><a href="#">Global Tour Operators</a></h1>';
echo'			<nav id="nav">';
echo'				<ul>';
//echo'					<li><a href="http://iram.innovador-ie.com/bookings.php"> < Cancel</a></li>';
echo'						<li><a href="faqs.html" target="_blank" class="button special"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;FAQs</a></i>';
echo'				</ul>';
echo'				</nav>';
echo'		</header>';





echo'		<section id="one" class="wrapper style1">';
echo'				<header class="major">';
echo'				<h2>Staff Login</h2>';
echo'				<p>Valid credentials are required.</p>';
echo'			</header>';

echo '<div class="container">';


echo ' <div class="imgcontainer">';
echo '   <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">';

					echo '<center><form name="" action="index.php?procedure=LoginAttempt" method="post">';
					echo '<br>Username<br> <input name="Username" type="text" value="" required>';
					echo '<br>Password<br> <input name="Password" type="password" value="" required>';
					echo '<br><br><button class="btn1" input type="submit">SUBMIT</button>';
					echo'</form>';
				
					echo ' </div>';
					echo '</form>';
					echo '</div>';
			  

					echo '</div>';



					echo'<div style="float:right" >';
					echo '<div class="box">';
					echo '<h1>Credentials for Testing</h1>';
					//echo 'Admin';
					//echo '<hr>';
					echo '<li>Username: <b>ad</b>
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password: <b>123</b>';
				
					echo '<br><li>Username: <b>tg</b>
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password: <b>123</b>';
					echo '</div>';
					echo '</div>';


echo'	<!-- Footer -->';
echo'		<footer id="footer">';
echo'			<div class="container">';
					
echo '<a href="http://iram.innovador-ie.com/bookings.php"> <button class="btn1">CANCEL</button></a><BR>';
					echo '	<span class="psw">Forgot <a href="home.php?procedure=home">password?</a></span>';							
		
		





echo'			<ul class="copyright">';
echo'				<li>&copy; Global Tour Operators 2020. All rights reserved.</li>';
			
echo'			</ul>';
echo'		</div>';
echo'		</footer>';

echo'</body>';
echo'</html>';
?>