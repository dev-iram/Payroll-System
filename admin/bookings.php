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
echo'		<title>Bookings | Global Tour Operators</title>';
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
  echo "<h1><br>Welcome <b>".$_SESSION["loggedinName"]."</b>, <br>You are logged in as:<b> ".$_SESSION["loggedinRole"]."</b> </h1>";

  
}
/* !!!!!!!!--------------------------------------- ADMINISTRATOR ROLE------------------------------------!!!!!!!*/
if ($myRole == "admin") 
{
//echo'	<body id="top">';
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

if ($procedure==""){

  $procedure="bookings";

}
if ($myRole <>"")
{
/*----------------------------------------------------------DELETE A TOUR----------------------------------------------------------*/
if ($procedure=="deletebooking"){
	 $bguid 	= $_REQUEST["bguid"];
 	 $query     = "UPDATE bookings SET Deleted=1 WHERE Guid='".$bguid."'";
     mysqli_query($dbConn, $query);
     echo '<meta http-equiv="refresh" content="0;url=bookings.php?procedure=bookings">';
  }
  

/*-------------------------------------------------------CHANGE ACTIVE STATUS-------------------------------------------------------*/

if ($procedure=="completebooking"){
	   $bguid 		= $_REQUEST["bookingsguid"];
		 $query      = "UPDATE bookings SET Completed=1 WHERE Guid='".$bguid."'";
     mysqli_query($dbConn, $query);
	     

  //echo $query;


  echo '<meta http-equiv="refresh" content="0;bookings.php?procedure=bookings">';

	}


//assign booking

  if ($procedure=="assignbooking"){

    $bguid      = $_REQUEST["bguid"];
    $tourguide  = $_REQUEST["tourguide"];

 // echo $bookguid;


    if ($_REQUEST["savedata"]<>""){


         $query      = "UPDATE bookings SET TourGuide_Guid='".$tourguide."' WHERE Guid='".$bguid."'";
         mysqli_query($dbConn, $query);

       
       //echo $query;
       
         echo '<meta http-equiv="refresh" content="0;url=bookings.php">';

        }

        echo'		<section id="one" class="wrapper style1">';
        echo'			<div class="container">';
        echo'				<header class="major">';
        echo'				<h2>Assign Tour Guide</h2>';
        echo'				<p>Assign a Tour Guide to a Booking</p>';

   echo '<form name="" action="bookings.php?procedure=assignbooking&bguid='.$bguid .'" method="post">';

   echo '<br>Select tour guide for tour: ';

   echo '<br><select name="tourguide" required>';

       $query  = "SELECT * FROM tourguide WHERE Active=1 ORDER BY TGFullName ";
           $resultSet = mysqli_query($dbConn, $query);
         echo '<option value="">None Selected</option>';

             while ($RowLine = mysqli_fetch_assoc($resultSet)) {

         echo '<option value="'. $RowLine["Guid"]. '"';
         echo '   >'. $RowLine["TGFullName"]. '</option>';


               }


   echo '</select>';

   echo '<input name="savedata" type="hidden" value="yes">';
   //echo '<br><input type="submit" value="Update booking">';
   echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">UPDATE BOOKING</button>';
   echo '</form>';
   echo'				</div>';
   echo'			</div>';
   echo'			</section>';
   echo'			</header>';




 }





/*------------------------------------------------------VIEW/EDIT/DELETE TOURS-----------------------------------------------------*/
  if ($procedure=="bookings"){
    echo'		<section id="one" class="wrapper style1">';
    echo'				<header class="major">';
    echo'				<h2>Bookings</h2>';
    echo'				<p>Assign, Edit and View Bookings</p>';
    echo'			</header>';
    
    echo '
      <table>
        <tr>
          <th>Assign Booking</th>
          <th>Booking Reference</th>
          <th>Customer Name</th>
          <th>Tour</th>
          
          
          <th>Customer Comment</th>
          <th>Tour Date</th>
          <th>Number of People</th>
          
          <th>Tour Guide Assigned</th>
          <th>Completed</th>
        </tr>';
    
       $query      = "SELECT *,bookings.Guid AS bGuid 
                      FROM bookings
                      LEFT JOIN tours ON tours.Guid = bookings.Tours_Guid
                      LEFT JOIN tourguide ON tourguide.Guid = bookings.TourGuide_Guid
                     ORDER BY bookings.Uid DESC 
       
       "; // WHERE Completed=0


   //echo $query;
         $DataTable  = mysqli_query($dbConn, $query);
         while($Rows = mysqli_fetch_assoc($DataTable)) {
          echo '<tr>';
        echo ' <td>';


        echo '<a id="'.$Rows["Guid"].'"></a>'; // marker or place holdeer

       // echo '<a href="tours.php?procedure=addatour"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>';
        //FONT AWESOME ICONS - EDIT AND DELETE
        
        echo '&nbsp;&nbsp;<a href="bookings.php?procedure=assignbooking&bguid='.$Rows["bGuid"].'"><i class="fa fa-address-book-o fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
          
        //echo '<a href="bookings.php?procedure=deletebooking&commissionsguid='.$Rows["Guid"].'" '. " onclick=\"return confirm('Are you sure you want to delete?')\"".'><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>';
        echo '</td>';
        echo ' <td>'.$Rows["CustomerBookingReference"].'</td>';
        echo ' <td>'.$Rows["CustomerFullName"].'</td>';
        echo ' <td>'.$Rows["TourName"].'</td>';
        
        
        echo ' <td>'.$Rows["CustomerComment"].'</td>';
        echo ' <td>'.$Rows["CustomerDateSelected"].'</td>';
        echo ' <td>'.$Rows["CustomerNumberOfPeople"].'</td>';
        
        echo ' <td>'.$Rows["TGFullName"].'</td>';
       
        //echo ' <td align="right">'.$Rows["CommissionPercentage"].'%</td>';
        echo ' <td>';
        echo '<div class="tooltip">';    
        if ($Rows["Completed"]==0   )
        {

          if ($Rows["TGFullName"] <> "") 
          {

          echo '<a href="bookings.php?procedure=completebooking&bookingsguid='.$Rows["bGuid"].'" title="" ><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>';
          echo '<span class="tooltiptext">Click to flag as complete</span>';
          }
            
        }
          else 
          {
            echo '<span class="tooltiptext">Tour is Done!</span>';
            echo '<i class="fa fa-check-circle fa-2x" aria-hidden="true"></i>';

          }


          
        echo '</div>';
        echo '</td>';
        echo '</tr>';
      }
     echo' </table>';
  
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
