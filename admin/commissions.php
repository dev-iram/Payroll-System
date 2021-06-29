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
echo'		<title>Commissions | Global Tour Operators</title>';
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

/* !!!!!!!! ----------------------------------------TOUR GUIDE ROLE ----------------------------------- !!!!!!!*/
if ($myRole == "tourguide") 
{
  echo'			<header id="header" class="skel-layers-fixed">';
  echo'			<h1><a href="#">Global Tour Operators</a></h1>';
  echo'			<nav id="nav">';
  echo'				<ul>';
  //echo'					<li><a href="http://iram.innovador-ie.com/bookings.php"> < Cancel</a></li>';
  echo'	<li><i class="fa fa-sign-out" aria-hidden="true">&nbsp;</i><a href="index.php?action=clean">Log Out</a></i>';
  echo'						<li><a href="FAQ.php" class="button special"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;FAQs</a></i>';
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
  echo'						<li><a href="FAQ.php" class="button special"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;FAQs</a></i>';
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
  $procedure="commissions";
  }
/*----------------------------------------------------------DELETE A TOUR----------------------------------------------------------*/
if ($procedure=="deletecommission"){
	 $commissionguid 	= $_REQUEST["commissionsguid"];
 	 $query     = "UPDATE commissions SET Deleted=1 WHERE Guid='".$commissionguid."'";
     mysqli_query($dbConn, $query);
     echo '<meta http-equiv="refresh" content="0;url=commissions.php?procedure=commissions">';
	}
/*-------------------------------------------------------CHANGE ACTIVE STATUS-------------------------------------------------------*/
if ($procedure=="activecommissions"){
	 $commissionguid 		= $_REQUEST["commissionsguid"];
	 $whatareyou    = $_REQUEST["iam"];
	 if($whatareyou == "yes") {
	 	 $query      = "UPDATE commissions SET Active=0 WHERE Guid='".$commissionguid."'";
         mysqli_query($dbConn, $query);
	 	}else {
	 	 $query      = "UPDATE commissions SET Active=1 WHERE Guid='".$commissionguid."'";
         mysqli_query($dbConn, $query);
       }
       

//echo $query;


  echo '<meta http-equiv="refresh" content="0;commissions.php?procedure=commissions#'.$commissionguid.'">';

	}

/*----------------------------------------------------------EDIT TOUR----------------------------------------------------------*/
if ($procedure=="editcommission"){

	 $commissionsguid 	   	= $_REQUEST["commissionsguid"];
	 $postCommissionLevel  = $_REQUEST["postCommissionLevel"];
   $postCommissionPercentage = $_REQUEST["postCommissionPercentage"];
   
  
   

   echo'		<section id="one" class="wrapper style1">';
   echo'			<div class="container">';
   echo'				<header class="major">';
   echo'				<h2>EDIT COMMISSION </h2>';
   echo'				<p>Please make amendments as required.</p>';

     //echo "<HR> Can i save data : ".$_REQUEST["savedata"];
     //echo "Can i save data? : ".$_REQUEST["savedata"];


     if ($_REQUEST["savedata"]==""){

		   $query      = "SELECT * FROM commissions WHERE Guid='".$commissionsguid."'";
       $DataTable  = mysqli_query($dbConn, $query);
       
    //echo $query;

	     while($Rows = mysqli_fetch_assoc($DataTable)) {
			      $postCommissionLevel   = $Rows["CommissionLevel"];
			  // $TourDesc   = $Rows["tourdesc"];
			    $postCommissionPercentage    = $Rows["CommissionPercentage"];
			    //$TourActive = $Rows["Active"];
			 //echo $TourPrice;
	     	}
     } 
     else 
     {
      $postCommissionLevel  = $_REQUEST["postCommissionLevel"];
      $postCommissionPercentage = $_REQUEST["postCommissionPercentage"];
       $query      = "UPDATE commissions SET CommissionLevel='".addslashes($postCommissionLevel)."',CommissionPercentage='".$postCommissionPercentage."' WHERE Guid='".$commissionsguid."'";
       mysqli_query($dbConn, $query);

      //echo $query;

		echo '<meta http-equiv="refresh" content="0;commissions.php?procedure=commissions">';
}
  echo  '<BR><BIG><BIG><BIG>Commission: '.$postCommissionLevel.'</BIG></BIG></BIG>';

  echo '<form name="" action="commissions.php?procedure=editcommission&commissionsguid='.$commissionguid.'" method="post">';
  echo '<br>Commission Level is : ';
  echo '<br><input name="postCommissionLevel" type="text" size="255" required value="'.$postCommissionLevel.'">';

  echo '<br>Commission Percentage is : ';
  echo '<br><input name="postCommissionPercentage" type="number"  required value="'.$postCommissionPercentage.'">';


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
if ($procedure=="addcommission"){
	 $postCommissionLevel  = $_REQUEST["postCommissionLevel"];
	 $postCommissionPercentage = $_REQUEST["postCommissionPercentage"];

   if ($_REQUEST["frank"]<>"")
     {
       $mycommissionsguid = guid();
       $query      = "INSERT INTO commissions (Guid,CommissionLevel,CommissionPercentage,Active) VALUES (
						'".$mycommissionsguid."','". addslashes($postCommissionLevel) ."','".$postCommissionPercentage."',1)";
       mysqli_query($dbConn, $query);
//	echo $query;
      echo '<meta http-equiv="refresh" content="0;url=commissions.php?procedure=commissions">';
   	}

echo'		<section id="one" class="wrapper style1">';
echo'			<div class="container">';
echo'				<header class="major">';
echo'				<h2>ADD A NEW COMMISSION</h2>';
echo'				<p>Please provide details of the new commission you would like to create. <br> Please include a title for the level and a suitable percentage.</p>';

echo '<form name="" action="commissions.php?procedure=addcommission" method="post">';
  echo '<br>Commission Level : ';
  echo '<br><input name="postCommissionLevel" type="text" size="150" required autofocus value="'.$postCommissionLevel.'">';

  echo '<br>Commission Percentage : ';
  echo '<br><input name="postCommissionPercentage" type="number"  required value="'.$postCommissionPercentage.'">';

  echo '<input name="frank" type="hidden" value="insertit">';
  echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">ADD COMMISSION</button>';
  echo '</form>';

  echo $postCommissionLevel;

  echo'				</div>';
  echo'			</div>';
  echo'			</section>';
  echo'			</header>';

echo'           <section class="special box">';
echo'						<i class="icon fa-flag major"></i>';
echo'							<h3>VIEW, EDIT AND DELETE COMMISSIONS</h3>';
echo'						<p>View Commissions that are active/inactive. </p>';
echo'                               <a href="commissions.php?procedure=commissions"> <button class="btn1">VIEW COMMISSIONS</button></a><BR><BR>';
echo'						</section>';
echo'					</div>';
echo'				</div>';
echo'			</div>';
echo'			</section>';
	}
/*------------------------------------------------------VIEW/EDIT/DELETE TOURS-----------------------------------------------------*/
  if ($procedure=="commissions"){
    echo'		<section id="one" class="wrapper style1">';
    echo'				<header class="major">';
    echo'				<h2>Commissions</h2>';
    echo'				<p>Create, Edit and View Commissions</p>';
    echo'			</header>';
    
    echo '
      <table>
        <tr>
          <th>Action</th>
          <th>ID</th>
          <th>Commission Level</th>
          <th>Commission Percentage</th>
          <th>Active</th>
        </tr>';
    
       $query      = "SELECT * FROM commissions WHERE Deleted=0";
         $DataTable  = mysqli_query($dbConn, $query);
         while($Rows = mysqli_fetch_assoc($DataTable)) {
          echo '<tr>';
        echo ' <td>';


        echo '<a id="'.$Rows["Guid"].'"></a>'; // marker or place holdeer

       // echo '<a href="tours.php?procedure=addatour"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>';
        //FONT AWESOME ICONS - EDIT AND DELETE
        
        echo '<a href="commissions.php?procedure=editcommission&commissionsguid='.$Rows["Guid"].'"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
          
        echo '<a href="commissions.php?procedure=deletecommission&commissionsguid='.$Rows["Guid"].'" '. " onclick=\"return confirm('Are you sure you want to delete?')\"".'><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>';
        echo '</td>';
        echo ' <td>'.$Rows["Uid"].'</td>';
        echo ' <td>'.$Rows["CommissionLevel"].'</td>';
        echo ' <td align="right">'.$Rows["CommissionPercentage"].'%</td>';
        echo ' <td>';
        echo '<div class="tooltip">';    
        if ($Rows["Active"]==1)
        {
            echo '<span class="tooltiptext">Click to make Inactive</span>';
          echo '<a href="commissions.php?procedure=activecommissions&commissionsguid='.$Rows["Guid"].'&iam=yes" title=""><i class="fa fa-check-circle fa-2x" aria-hidden="true"></i></a>';
        }
          else 
          {
          echo '<a href="commissions.php?procedure=activecommissions&commissionsguid='.$Rows["Guid"].'&iam=no" title="" ><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>';
            echo '<span class="tooltiptext">Click to make Active</span>';
          }
        echo '</div>';
        echo '</td>';
        echo '</tr>';
      }
     echo' </table>';
     
echo'           <section class="special box">';
echo'						<i class="icon fa-flag major"></i>';
echo'							<h3>Add a Commission</h3>';
echo'						<p>Add a commission </p>';
echo'                               <a href="commissions.php?procedure=addcommission"> <button class="btn1">ADD COMMISSIONS</button></a><BR><BR>';
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
