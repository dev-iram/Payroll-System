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
echo'		<title>Tours | Global Tour Operators</title>';
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

$procedure = $_REQUEST["procedure"];


echo'	</head>';
/*
echo'	<body id="top">';
echo'		<!-- Header -->';
echo'			<header id="header" class="skel-layers-fixed">';
echo'			<h1><a href="#">Global Tour Operators</a></h1>';
echo'			<nav id="nav">';*/
/* !!!!!!!! ----------------------------------------TOUR GUIDE ROLE ----------------------------------- !!!!!!!*/
if ($myRole == "tourguide") 
{
  echo'			<header id="header" class="skel-layers-fixed">';
  echo'			<h1><a href="#">Global Tour Operators</a></h1>';
  echo'			<nav id="nav">';
  echo'				<ul>';
  //echo'					<li><a href="http://iram.innovador-ie.com/bookings.php"> < Cancel</a></li>';
  echo'	<li><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><a href="index.php?action=clean">Log Out</a></i>';
  echo'						<li><a href="faqs.html" target="_blank" class="button special"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;FAQs</a></i>';
  echo'				</ul>';
  echo'				</nav>';
  echo'		</header>';
  echo "<h1><br>Welcome <b>".$_SESSION["loggedinName"]."</b>, <br>You are logged in as:<b> ".$_SESSION["loggedinRole"]."</b> </h1>";
echo'				<header class="major">';
  echo'			<div class="container">';
  echo "<h1><br><b>Error 003: You do not have permission to access this page. This section requires administrator access privileges. Please contact your systems administrator.</h1></b>"; 
  echo ' <script>';
echo ' function BackToHome() {';
echo '   location.href = "home.php";';
echo ' }';
echo ' </script>';

echo'<button onclick="BackToHome()" type="button" class="btn1">HOME</button><br><br>';
echo'</div>';


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

  echo "<h1><br>Welcome <b>".$_SESSION["loggedinName"]."</b>, <br>You are logged in as:<b> ".$_SESSION["loggedinRole"]."</b> </h1>";
}
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
echo'<button onclick="LoginProcedure()" type="button" class="btn1">Staff Login</button><br><br>';
echo'</div>';
}


if ($myRole == "admin") {
 
/*----------------------------------------------------------MAIN TOUR PAGE----------------------------------------------------------*/
if ($procedure==""){
  $procedure="tours";
  }
/*------------------------------------------------------VIEW/EDIT/DELETE TOURS-----------------------------------------------------*/
if ($procedure=="tours"){
  echo'		<section id="one" class="wrapper style1">';
  echo'				<header class="major">';
  echo'				<h2>Tours</h2>';
  echo'				<p>Create, Edit and View Tours</p>';
  echo'			</header>';
  
  echo '
    <table>
      <tr>
        <th>Action</th>
        <th>ID</th>
        <th>Tour Name</th>
        <th>Price</th>
        <th>Active</th>
      </tr>';
  
     $query      = "SELECT * FROM tours WHERE Deleted=0";
       $DataTable  = mysqli_query($dbConn, $query);
       while($Rows = mysqli_fetch_assoc($DataTable)) {
        echo '<tr>';
      echo ' <td>';
     // echo '<a href="tours.php?procedure=addatour"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>';
      //FONT AWESOME ICONS - EDIT AND DELETE
      
      echo '<a href="tours.php?procedure=edittour&tourguid='.$Rows["Guid"].'"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
        
      echo '<a href="tours.php?procedure=deltour&tourguid='.$Rows["Guid"].'" '. " onclick=\"return confirm('Are you sure you want to delete?')\"".'><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>';
      echo '</td>';
      echo ' <td>'.$Rows["Uid"].'</td>';
      echo ' <td>'.$Rows["TourName"].'</td>';
      echo ' <td align="right">&euro; '.$Rows["TourPrice"].'</td>';
      echo ' <td>';
      echo '<div class="tooltip">';    
      if ($Rows["Active"]==1)
      {
          echo '<span class="tooltiptext">Click to make Inactive</span>';
        echo '<a href="tours.php?procedure=changestatus&tourguid='.$Rows["Guid"].'&iam=yes" title=""><i class="fa fa-check-circle fa-2x" aria-hidden="true"></i></a>';
      }
        else 
        {
        echo '<a href="tours.php?procedure=changestatus&tourguid='.$Rows["Guid"].'&iam=no" title="" ><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>';
          echo '<span class="tooltiptext">Click to make Active</span>';
        }
      echo '</div>';
      echo '</td>';
      echo '</tr>';
    }
   echo' </table>';
   
echo'           <section class="special box">';
echo'						<i class="icon fa-flag major"></i>';
echo'							<h3>Add a Tour</h3>';
echo'						<p>Add Tours that are active/inactive </p>';
echo'                               <a href="tours.php?procedure=addatour"> <button class="btn1">ADD TOURS</button></a><BR><BR>';
echo'						</section>';
echo'					</div>';
echo'				</div>';
echo'			</div>';
echo'			</section>';    
}





/*----------------------------------------------------------DELETE A TOUR----------------------------------------------------------*/
if ($procedure=="deltour"){
	 $tourguid 	= $_REQUEST["tourguid"];
 	 $query     = "UPDATE tours SET Deleted=1 WHERE Guid='".$tourguid."'";
     mysqli_query($dbConn, $query);
     echo '<meta http-equiv="refresh" content="0;url=tours.php?procedure=tours">';
	}
/*-------------------------------------------------------CHANGE ACTIVE STATUS-------------------------------------------------------*/
if ($procedure=="changestatus"){
	 $tourguid 		= $_REQUEST["tourguid"];
	 $whatareyou    = $_REQUEST["iam"];
	 if($whatareyou == "yes") {
	 	 $query      = "UPDATE tours SET Active=0 WHERE Guid='".$tourguid."'";
         mysqli_query($dbConn, $query);
	 	}else {
	 	 $query      = "UPDATE tours SET Active=1 WHERE Guid='".$tourguid."'";
         mysqli_query($dbConn, $query);
	 		}
     echo '<meta http-equiv="refresh" content="0;url=tours.php?procedure=tours">';
	}

/*----------------------------------------------------------EDIT TOUR----------------------------------------------------------*/
if ($procedure=="edittour"){

	 $tourguid 	   	= $_REQUEST["tourguid"];
	 $postTourName  = $_REQUEST["postTourName"];
   $postTourPrice = $_REQUEST["postTourPrice"];
   

   echo'		<section id="one" class="wrapper style1">';
   echo'			<div class="container">';
   echo'				<header class="major">';
   echo'				<h2>EDIT TOUR </h2>';
   echo'				<p>Please make amendments as required.</p>';

     //echo "<HR> Can i save data : ".$_REQUEST["savedata"];
     //echo "Can i save data? : ".$_REQUEST["savedata"];


     if ($_REQUEST["savedata"]==""){

		   $query      = "SELECT * FROM tours WHERE Guid='".$tourguid."'";
       $DataTable  = mysqli_query($dbConn, $query);
       
    //echo $query;

	     while($Rows = mysqli_fetch_assoc($DataTable)) {
			      $postTourName   = $Rows["TourName"];
			  // $TourDesc   = $Rows["tourdesc"];
			    $postTourPrice    = $Rows["TourPrice"];
			    //$TourActive = $Rows["Active"];
			 //echo $TourPrice;
	     	}
     } 
     else 
     {
      $postTourName  = $_REQUEST["postTourName"];
      $postTourPrice = $_REQUEST["postTourPrice"];
       $query      = 
       "UPDATE tours SET TourName='".addslashes($postTourName)."',TourPrice='".$postTourPrice."' WHERE Guid='".$tourguid."'";
       mysqli_query($dbConn, $query);

      //echo $query;

		echo '<meta http-equiv="refresh" content="0;url=tours.php?procedure=tours">';
}
  echo  '<BR><BIG><BIG><BIG>Tour: '.$postTourName.'</BIG></BIG></BIG>';

  echo '<form name="" action="tours.php?procedure=edittour&tourguid='.$tourguid.'" method="post">';
  echo '<br>Tour name is : ';
  echo '<br><input name="postTourName" type="text" size="150" required value="'.$postTourName.'">';

  echo '<br>Tour Price is : ';
  echo '<br><input name="postTourPrice" type="number"  required value="'.$postTourPrice.'">';


  echo '<input name="savedata" type="hidden" value="yes">';
  echo '<br><br><button class="btn1" input type="submit" value="Save & Update">UPDATE</button>';
  echo '</form>';


  echo'						</section>';
  echo'					</div>';
  echo'				</div>';
  echo'			</div>';
  echo'			</section>';

  //echo $postTourName;
	}
/*------------------------------------------------------------ADD A TOUR------------------------------------------------------------*/
if ($procedure=="addatour"){
	 $postTourName  = $_REQUEST["postTourName"];
	 $postTourPrice = $_REQUEST["postTourPrice"];

   if ($_REQUEST["frank"]<>"")
     {
       $myTourGUID = guid();
       $query      = "INSERT INTO tours (Guid,TourName,TourPrice,Active) VALUES (
						'".$myTourGUID."','". addslashes($postTourName) ."','".$postTourPrice."',1)";
       mysqli_query($dbConn, $query);
//	echo $query;
      echo '<meta http-equiv="refresh" content="0;url=tours.php?procedure=tours">';
   	}

echo'		<section id="one" class="wrapper style1">';
echo'			<div class="container">';
echo'				<header class="major">';
echo'				<h2>ADD A NEW TOUR</h2>';
echo'				<p>Please provide details of the new tour you would like to create. <br> Please include a Tour Name with a brief description and a suitable price.</p>';

echo '<form name="" action="tours.php?procedure=addatour" method="post">';
  echo '<br>Tour name is : ';
  echo '<br><input name="postTourName" type="text" size="150" required autofocus value="'.$postTourName.'">';

  echo '<br>Tour Price is : ';
  echo '<br><input name="postTourPrice" type="number"  required value="'.$postTourPrice.'">';

  echo '<input name="frank" type="hidden" value="insertit">';
  echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">ADD TOUR</button>';
  echo '</form>';

  echo $postTourName;

  echo'				</div>';
  echo'			</div>';
  echo'			</section>';
  echo'			</header>';

echo'           <section class="special box">';
echo'						<i class="icon fa-flag major"></i>';
echo'							<h3>VIEW TOURS</h3>';
echo'						<p>Add Tours that are active/inactive </p>';
echo'                               <a href="tours.php?procedure=tours"> <button class="btn1">VIEW TOURS</button></a><BR><BR>';
echo'						</section>';
echo'					</div>';
echo'				</div>';
echo'			</div>';
echo'			</section>';
	}

/*--------------------------------------------------------------FOOTER--------------------------------------------------------------*/
      echo'		<footer id="footer">';
      echo'			<div class="container">';                      
      echo'			<ul class="copyright">';
      echo'				<li>&copy; Global Tour Operators 2020. All rights reserved.</li>';
      echo'			</ul>';
      echo'		</div>';
      echo'		</footer>';
/*------------------------------------------------------------------END-------------------------------------------------------------*/

}
?>
</body>
</html>
