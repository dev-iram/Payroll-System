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
echo'		<title>Payroll | Global Tour Operators</title>';
echo'		<meta http-equiv="content-type" content="text/html; charset=utf-8" />';

echo'<meta name="viewport" content="width=device-width, initial-scale=1.0">';
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



if ($procedure=="")
{
  $procedure="DateRange";
}

/*------------------------------------- DATE RANGE-----------------------------------------*/
if ($myRole <>"")
{

if ($procedure=="DateRange")
{
echo'		<section id="one" class="wrapper style1">';
echo'				<header class="major">';
echo'				<h2>Payroll</h2>';
echo'				<p>Select a Date Range to view Payroll</p>';
echo'			</header>';

echo'			<div class="container">';
echo'				<header class="major">';
echo '<form name="" action="payroll.php?procedure=CalculatePayroll" method="post">';
echo 'Start Date: ';
echo '<input name="StartDate" type ="date" required value="">';
echo '&nbsp;&nbsp&nbsp;&nbsp;End Date: ';
echo '<input name="EndDate" type="date" required value="">';


 if ($myRole == "admin") {

    echo '<br><br><br>Select a Tour Guide to view Payroll:';

    echo '<br><select name="tourguide" required>';

        $query  = "SELECT * FROM tourguide WHERE Active=1 ORDER BY TGFullName ";
            $resultSet = mysqli_query($dbConn, $query);
          echo '<option value="">Please Select a Tour Guide</option>';

              while ($RowLine = mysqli_fetch_assoc($resultSet)) {

          echo '<option value="'. $RowLine["Guid"]. '"';
          echo '   >'. $RowLine["TGFullName"]. '</option>';


                }

    echo '</select>';

              }



   echo '<input name="savedata" type="hidden" value="yes">';
   echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">SUBMIT</button>';
   echo '</form>';
   echo'				</div>';
   echo'			</div>';
   echo'			</section>';
   echo'			</header>';










}
/*
if ($procedure=="AssignTourGuide")
{

}*/

/*------------------------------------- CALCULATE PAYROLL-----------------------------------------*/
if ($procedure=="CalculatePayroll")
{

  $query      = "SELECT * FROM setupsystem";
  $DataTable  = mysqli_query($dbConn, $query);
  while($Rows = mysqli_fetch_assoc($DataTable)) 
  
{
  $Uid         = $Rows["Uid"];
      $taxrate     = $Rows["TaxRate"];
      $FlatRate    = $Rows["FlatRate"];
    }


    $tourguide  =  $_REQUEST["tourguide"];

    if ($_SESSION["loggedinRole"]=="tourguide"){

	    $tourguide = $_SESSION["tourguideGuid"];

    	}

$StartDate = $_REQUEST["StartDate"];
$EndDate =  $_REQUEST["EndDate"];



$query      = "SELECT TGFullName FROM tourguide WHERE Guid='".$tourguide."'";
$DataTable  = mysqli_query($dbConn, $query);
while($Rows = mysqli_fetch_assoc($DataTable)) {
 $myTGname = $Rows["TGFullName"];
 }

 

//echo "<H2>Payroll for <B>".$myTGname.",</B><br>Date Range Selected: ". $StartDate ." - ". $EndDate."</H2>";
echo "<H2>Payroll for <B>".$myTGname.",</B><br>Date Range Selected: ". $StartDate ." - ". $EndDate."</H2>";
echo '        <table>
		          <tr>
		          <th>Booking Reference</th>
		          <th>Tour Name</th>
		          <th>Total Price</th>
		          <th>Surcharge %</th>
		          <th>Surcharge<br>Amount</th>
		          <th>Commission<br>Percent %</th>
		          <th>Commision <br />Earned</th>
              <th>Flat<br>Rate</th>

		          <th>Line Total</th>
		  </tr>';

		 $query      = "SELECT *,bookings.Guid AS bookguid
		 				FROM bookings
		 				LEFT JOIN tours ON tours.Guid = bookings.Tours_Guid
		 				LEFT JOIN tourguide ON tourguide.Guid = bookings.Tourguide_Guid
		 				LEFT JOIN commissions ON commissions.Guid = tourguide.Commissions_Guid
		 				LEFT JOIN surcharges ON surcharges.MonthNumber = substring(bookings.CustomerDateSelected,6,2)
		 				WHERE bookings.Deleted=0
		 				AND CustomerDateSelected >= '".$StartDate."'
		 				AND CustomerDateSelected <= '".$EndDate."'
                        AND Completed = 1
                        AND bookings.Tourguide_Guid = '".$tourguide."'
		 				ORDER BY CustomerDateSelected DESC";


//echo $query;


$DataTable  = mysqli_query($dbConn, $query);
$Pax               = 0;
$TotalCost      = 0;
$TotalSurcharge     = 0;
$TotalCommEarned = 0;
$TotalFlatRate    = 0;
$BigTotalforLines  = 0;
while($Rows = mysqli_fetch_assoc($DataTable)) {
echo '<tr>';
echo ' <td>'.$Rows["CustomerBookingReference"].'</td>'."\n";
echo ' <td>'.$Rows["CustomerNumberOfPeople"]." X &euro;".$Rows["TourPrice"].'</td>';

 $TotalCostOfTour = $Rows["CustomerNumberOfPeople"] * $Rows["TourPrice"];
 $TotalCost +=  $TotalCostOfTour;
echo ' <td>&euro;'.number_format($TotalCostOfTour,2).'</td>';

$Pax += $Rows["CustomerNumberOfPeople"];

echo ' <td>'.$Rows["ChargeValue"].'%</td>';
     $SurchargedVal = $TotalCostOfTour *  (1 + ($Rows["ChargeValue"]/100));
     echo ' <td>&euro; '.number_format($SurchargedVal,2).'</td>';
 $TotalSurcharge += $SurchargedVal;

echo ' <td>'.$Rows["CommissionPercentage"].'%</td>';

$CommtoTG = $SurchargedVal *  ($Rows["CommissionPercentage"]/100);

echo ' <td>&euro; '.number_format($CommtoTG,2).'</td>';
echo ' <td>&euro;'.$FlatRate.'</td>';

$TotalFlatRate += $FlatRate;

      $TotalCommEarned  +=$CommtoTG;


echo ' <td>&euro;';
 $myLineTotal = $CommtoTG + $FlatRate;
echo number_format($myLineTotal,2);
echo '</div>';
echo '</td>';
echo '</tr>';

$BigTotalforLines += $myLineTotal;


}
echo '<tr>';
  	  echo ' <td>'.$Rows["CustomerBookingReference"].'</td>'."\n";
  	  echo ' <td>'.$Pax.'</td>'."\n";
  	  echo ' <td>&euro;'.number_format($TotalCost,2).'</td>'."\n";
  	  echo ' <td>&nbsp;</td>'."\n";
  	  echo ' <td>&euro;'.number_format($TotalSurcharge,2).'</td>'."\n";
  	  echo ' <td>&nbsp;</td>'."\n";
	  echo ' <td>&euro;'.number_format($TotalCommEarned,2).'</td>'."\n";
	  echo ' <td>&euro;'.number_format($TotalFlatRate,2).'</td>'."\n";
	  echo ' <td>&euro;'.number_format($BigTotalforLines,2).'</td>'."\n";
	  echo '</tr>';
	  echo' </table>';



		echo '
		<table width="50%">
		  <tr>
		    <th>Description </th>
		    <th>Value</th>
		  </tr>';
          echo '<tr>';
	  	  echo ' <td>Total Commision Earnings</td>'."\n";
  		  echo ' <td>&euro; '.number_format($BigTotalforLines,2).'</td>'."\n";
  	     echo '</tr>';
          $TaxtoPay = $BigTotalforLines * ($taxrate/100);
          echo '<tr>';
	  	  echo ' <td>Tax Rate for Revenue '.$taxrate.'%</td>'."\n";
  		  echo ' <td>&euro; '.number_format($TaxtoPay,2) .'</td>'."\n";
  	     echo '</tr>';

          echo '<tr>';
	  	  echo ' <td>Payment to your account  </td>'."\n";
  		  echo ' <td><BIG><BIG><b>&euro;'.number_format(($BigTotalforLines-$TaxtoPay),2)  .'</BIG></BIG></b></td>'."\n";
  	     echo '</tr>';


 	  echo' </table>';

//      	echo $query;


}
}

?>

