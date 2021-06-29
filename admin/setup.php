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
echo'		<title>Set Up | Global Tour Operators</title>';
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
  


 /*snackbar styling*/
 
 #snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: red;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
  }
  
  #snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
  }
  
  @-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
  }
  
  @keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
  }
  
  @-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
  }
  
  @keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
  }

  </style>';

  echo ' 
  <script>
function MySnackbar() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>';




//echo'	<body id="top">';



if ($_REQUEST["snackmsg"] <> "")
{
    echo'<body onload="MySnackbar()">';
}
else{
    echo'<body>';
}


$procedure = $_REQUEST["procedure"];
echo'	</head>';

 //$myRole = $_SESSION["loggedinRole"]; //login based on role! 


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
if ($procedure==""){
echo'		<section id="one" class="wrapper style1">';
echo'				<header class="major">';
echo'				<h2>Set Up</h2>';
echo'				<p>Please select an option in order to proceed.</p>';
echo'			</header>';
echo'			<div class="container">';
echo'				<div class="row">';
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
/*-----------------------------------------------------SYSTEM SET UP--------------------------------------------*/
if ($procedure=="systemsetup")
{//change to systemsetup - not working


$savedata = $_REQUEST["savedata"];


//echo $savedata;
    if ($savedata=="")
    {

      $query = "SELECT * FROM setupsystem";
      $DataTable  = mysqli_query($dbConn, $query);
      while($Rows = mysqli_fetch_assoc($DataTable)) 
      {   
          
          $uid = $Rows["Uid"];
          $taxrate = $Rows["TaxRate"];
          $flatrate = $Rows["FlatRate"];


      }

      if ($uid=="")
                {
                $query = "INSERT INTO setupsystem (FlatRate) VALUES ('1.00')";
                   mysqli_query($dbConn, $query);

         }

    }
    else{

      //echo $savedata;

        //echo "Im here!!";

        $taxrate = $_REQUEST["TaxRate"];
        $flatrate = $_REQUEST["FlatRate"];


        $query = "UPDATE setupsystem SET TaxRate='".$taxrate."',FlatRate='".$flatrate."'";
        mysqli_query($dbConn, $query);
        echo' $query';
        


        echo '<meta http-equiv="refresh" content="0;url=setup.php?procedure=systemsetup&snackmsg=Set Up Data Saved...">';
    }



    echo'		<section id="one" class="wrapper style1">';
    echo'			<div class="container">';
    echo'				<header class="major">';
    echo'				<h2>System Set Up</h2>';
    echo'				<p>Allocating rates for Tax and Flat Rates.</p>';
    
        echo '<form name="" action="setup.php?procedure=systemsetup" method="post">';
      echo '<br>Tax Rate Value: ';
      echo '<br><input name="TaxRate" type="number" size="150" required autofocus value="'.$taxrate.'">';
    
      echo '<br>Flat Rate Value : ';
      echo '<br><input name="FlatRate" type="number" step="0.01"  required value="'.$flatrate.'">';
    
      echo '<input name="savedata" type="hidden" value="Iram">';
      echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">Update</button>';
      echo '</form>';
    
      echo'				</div>';
      echo'			</div>';
      echo'			</section>';
      echo'			</header>';


      
      echo'		<section id="one" class="wrapper style1">';
      echo'				<header class="major">';
      echo'				<h2>Set Up</h2>';
      echo'				<p>Please select an option in order to proceed.</p>';
      echo'			</header>';
      echo'			<div class="container">';
      echo'				<div class="row">';
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

/*-----------------------------------------------------SURCHARGES SET UP--------------------------------------------*/
if ($procedure=="surchargesetup")
{//change to surchargesetup - not working

    echo'		<section id="one" class="wrapper style1">';
    echo'				<header class="major">';
    echo'				<h2>Surcharge Set Up</h2>';
    echo'				<p>Create, Edit and View Surcharges</p>';
    echo'			</header>';
    


    $Months = array("01" =>"January", "02"=>"February", "03"=>"March", "04"=>"April",
    "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", 
    "11"=>"November", "12"=>"December");

   echo '
      <table>
        <tr>
          <th>Action</th>
          <th>ID</th>
          <th>Month</th>
          <th>Value</th>
        </tr>';
    
       $query      = "SELECT * FROM surcharges ORDER BY Uid"; //monthnumber
         $DataTable  = mysqli_query($dbConn, $query);
         while($Rows = mysqli_fetch_assoc($DataTable)) {
          echo '<tr>';
        echo ' <td>';


        echo '<a id="'.$Rows["Guid"].'"></a>'; // marker or place holdeer

        //EDIT
        echo '<a href="setup.php?procedure=editsurcharge&surchargesguid='.$Rows["Guid"].'"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 

        echo '</td>';
        echo ' <td>'.$Rows["Uid"].'</td>';
        echo ' <td>'.$Months[$Rows["MonthNumber"]].'</td>';
        echo ' <td align="right">'.$Rows["ChargeValue"].'%</td>';
        echo '</tr>';
      }
     echo' </table>';
     
echo'           <section class="special box">';
echo'						<i class="icon fa-flag major"></i>';
echo'							<h3>Add a Surcharge</h3>';
echo'						<p>Add a Surcharge </p>';
echo'                               <a href="setup.php?procedure=addsurcharge"> <button class="btn1">ADD SURCHARGE</button></a><BR><BR>';
echo'						</section>';
echo'					</div>';
echo'				</div>';
echo'			</div>';
echo'			</section>';    




echo'		<section id="one" class="wrapper style1">';
echo'				<header class="major">';
echo'				<h2>Set Up</h2>';
echo'				<p>Please select an option in order to proceed.</p>';
echo'			</header>';
echo'			<div class="container">';
echo'				<div class="row">';
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


/*------------------------------------------------------------ADD A SURCHARGE------------------------------------------------------------*/
if ($procedure=="addsurcharge"){
  //change to addsurcharge
  $Months = array("01" =>"January", "02"=>"February", "03"=>"March", "04"=>"April",
  "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", 
  "11"=>"November", "12"=>"December");

  $monthselected  = $_REQUEST["monthselected"];
  $SurchargePercentage = $_REQUEST["SurchargePercentage"];

if ($_REQUEST["savedata"]<>"")
  {
    $MySurchargesGuid = guid();


    $query      = "INSERT INTO surcharges (Guid,MonthNumber,ChargeValue) VALUES (
                     '".$MySurchargesGuid."','". addslashes($monthselected) ."','".$SurchargePercentage."')";
    mysqli_query($dbConn, $query);
//	echo $query;


   echo '<meta http-equiv="refresh" content="0;url=setup.php?procedure=surchargesetup&snackmsg=Added New Surcharge!">';
    }

//allows user to select a month from a list



echo'		<section id="one" class="wrapper style1">';
echo'			<div class="container">';
echo'				<header class="major">';
echo'				<h2>ADD A SURCHARGE</h2>';
echo'				<p>Please provide details of the surcharge you would like to create.</p>';

echo '<form name="" action="setup.php?procedure=addsurcharge" method="post">';



echo '<hr>Please Select a Month: <select name="monthselected" required>';

              echo '<option value="">---Please Select A Month---</option>';
              
              foreach ($Months as $key => $value)
              {
                  echo '<option value="'.$key.'">'.$value.'</option>';
              }
    
            echo '</select>';


echo '<br>Surcharge Percentage: ';
echo '<br><input name="SurchargePercentage" type="number" step="0.1"  required value="'.$SurchargePercentage.'">';

echo '<input name="savedata" type="hidden" value="yes">';
echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">ADD SURCHARGE</button>';
echo '</form>';


echo'				</div>';
echo'			</div>';
echo'			</section>';
echo'			</header>';

echo'		<section id="one" class="wrapper style1">';
echo'				<header class="major">';
echo'				<h2>Set Up</h2>';
echo'				<p>Please select an option in order to proceed.</p>';
echo'			</header>';
echo'			<div class="container">';
echo'				<div class="row">';
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


 
   /*----------------------------------------------------------EDIT SURCHARGE----------------------------------------------------------*/
if ($procedure=="editsurcharge"){
  $surchargesguid       = $_REQUEST["surchargesguid"];
  $MonthSelected        = $_REQUEST["MonthSelected"];
  $SurchargePercentage  = $_REQUEST["SurchargePercentage"];

  $Months = array("01" =>"January", "02"=>"February", "03"=>"March", "04"=>"April",
  "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", 
  "11"=>"November", "12"=>"December");

  if ($_REQUEST["savedata"]=="") {

    $query      = "SELECT * FROM surcharges WHERE Guid='".$surchargesguid."'";
    $DataTable  = mysqli_query($dbConn, $query);


    echo $query;

    while($Rows = mysqli_fetch_assoc($DataTable)) {
      $MonthSelected          = $Rows["MonthNumber"];
      $SurchargePercentage    = $Rows["ChargeValue"];
     }

      

  } 
  else 
    {
      //$MySurchargesGuid = guid();

      $MonthSelected      = $_REQUEST["MonthSelected"];
      $SurchargePercentage = $_REQUEST["SurchargePercentage"];

      
      $query      =   "UPDATE surcharges SET MonthNumber='".addslashes($MonthSelected)."',ChargeValue='".$SurchargePercentage."' WHERE Guid='".$surchargesguid."'";
      mysqli_query($dbConn, $query);

    echo '<meta http-equiv="refresh" content="0;url=setup.php?procedure=surchargesetup&snackmsg=Successfully Edited Surcharge!">';
      }


  echo'		<section id="one" class="wrapper style1">';
  echo'			<div class="container">';
  echo'				<header class="major">';
  echo'				<h2>EDIT SURCHARGE</h2>';
  echo'				<p>Make amendments as required.</p>';

  echo '<form name="" action="setup.php?procedure=editsurcharge&surchargesguid='.$surchargesguid.'" method="post">'."\n";;



  echo '<hr>Please Select a Month: <select name="MonthSelected" required>'."\n";;

                echo '<option value="">---Please Select A Month---</option>';
                
                foreach ($Months as $key => $value)
                {

                  if ($key==$MonthSelected)
                    {
                      $selected = "Selected";
                    } else {
                      $selected = "";
                    }
                    echo '<option value="'.$key.'"' .$selected. '  >'.$value.'</option>'."\n";
                }

                             


              echo '</select>'."\n";;


  echo '<br>Surcharge Percentage: ';
  echo '<br><input name="SurchargePercentage" type="number" step="0.1"  required value="'.$SurchargePercentage.'">'."\n";

  echo '<input name="savedata" type="hidden" value="yes">';
  echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">UPDATE SURCHARGE</button>'."\n";
  echo '</form>';


  echo'				</div>';
  echo'			</div>';
  echo'			</section>';
  echo'			</header>';




  echo'		<section id="one" class="wrapper style1">';
  echo'				<header class="major">';
  echo'				<h2>Set Up</h2>';
  echo'				<p>Please select an option in order to proceed.</p>';
  echo'			</header>';
  echo'			<div class="container">';
  echo'				<div class="row">';
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




/*-----------------------------------------------------USERS SET UP--------------------------------------------*/
if ($procedure=="usersetup")
{//change to usersetup - not working

    echo'		<section id="one" class="wrapper style1">';
    echo'				<header class="major">';
    echo'				<h2>Users Set Up</h2>';
    echo'				<p>Create, Edit and View Users</p>';
    echo'			</header>';
    
   echo '
      <table>
        <tr>
          
          <th>ID</th>
          <th>Full Name</th>
          <th>Username</th>
          <th>Password</th>
          
          <th>Role</th>
        </tr>';
    
       $query      = "SELECT * FROM Users ";
         $DataTable  = mysqli_query($dbConn, $query);
         while($Rows = mysqli_fetch_assoc($DataTable)) {
          echo '<tr>';
        //echo ' <td>';


        //echo '<a id="'.$Rows["Guid"].'"></a>'; // marker or place holdeer

        //EDIT
        //echo '<a href="setup.php?procedure=edituser&userguid'.$Rows["Guid"].'"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 

        //echo '</td>';
        echo ' <td>'.$Rows["Uid"].'</td>';
        echo ' <td>'.$Rows["UserFullName"].'</td>';
        echo ' <td>'.$Rows["Username"].'</td>';
        echo ' <td>'.$Rows["Password"].'</td>';
        
        echo ' <td>'.$Rows["Role"].'</td>';
        //echo ' <td align="right">'.$Rows["ChargeValue"].'%</td>';
        echo '</tr>';
      }
     echo' </table>';
     
echo'           <section class="special box">';
echo'						<i class="icon fa-flag major"></i>';
echo'							<h3>Add a New User</h3>';
echo'						<p>Create a new user with valid credentials.</p>';
echo'                               <a href="setup.php?procedure=addnewuser"> <button class="btn1">ADD NEW USER</button></a><BR><BR>';
echo'						</section>';
echo'					</div>';
echo'				</div>';
echo'			</div>';
echo'			</section>';    






echo'		<section id="one" class="wrapper style1">';
echo'				<header class="major">';
echo'				<h2>Set Up</h2>';
echo'				<p>Please select an option in order to proceed.</p>';
echo'			</header>';
echo'			<div class="container">';
echo'				<div class="row">';
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





/*------------------------------------------------------------ADD NEW USER------------------------------------------------------------*/
if ($procedure=="addnewuser"){
  //change to addnewuser


  $Roles = array("admin"=> "admin", "tourguide" => "tourguide");

  $Username  = $_REQUEST["Username"];
  $Password = $_REQUEST["Password"];
  $UserFullName = $_REQUEST["UserFullName"];
  $roleselected  = $_REQUEST["roleselected"]; 
  $guideselected  = $_REQUEST["guideselected"];

  

if ($_REQUEST["savedata"]<>"")
  {
    $MyNewUserGuid = guid();


    $query      = "INSERT INTO Users (Guid,Username,Password,UserFullName,Role,TourGuide_Guid) VALUES (
                     '".$MyNewUserGuid."','". addslashes($Username) ."','".addslashes($Password)."'
                     ,'". addslashes($UserFullName) ."','".addslashes($roleselected)."','".$guideselected."' )";
    mysqli_query($dbConn, $query);
//	echo $query;


   echo '<meta http-equiv="refresh" content="0;url=setup.php?procedure=usersetup&snackmsg=Added New User!">';
    }

//allows user to select a month from a list



echo'		<section id="one" class="wrapper style1">';
echo'			<div class="container">';
echo'				<header class="major">';
echo'				<h2>ADD NEW USER</h2>';
echo'				<p>Please provide details of the new user you would like to create.</p>';

echo '<form name="" action="setup.php?procedure=addnewuser" method="post">';


echo '<br>Username ';
echo '<br><input name="Username" type="text"  required value="'.$Username.'">';

echo '<br>Password: ';
echo '<br><input name="Password" type="text"   required value="'.$Password.'">';


echo '<br>FullName: ';
echo '<br><input name="UserFullName" type="text"   required value="'.$UserFullName.'">';

echo '<hr>Please Select a Role: <select name="roleselected" required>';

              echo '<option value="">---Please Select A Role---</option>';
              
              foreach ($Roles as $key => $value)
              {
                  echo '<option value="'.$key.'">'.$value.'</option>';
              }
    
            echo '</select>';


echo '<hr>Select Tour Guide: <select name="guideselected">';


$query = "SELECT * FROM tourguide ORDER BY TGFullName";
$resultSet = mysqli_query($dbConn, $query);
echo '<option value="">---Please Select A Commission---</option>';
while($RowLine = mysqli_fetch_assoc($resultSet)) {
echo '<option value="'. $RowLine["Guid"]. '"';

if ($RowLine["Guid"]==$post_tourselected){
echo ' selected ';
}

echo '   >'. $RowLine["TGFullName"] .'</option>';
}

echo '</select>';

echo '<input name="savedata" type="hidden" value="yes">';
echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">ADD NEW USER</button>';
echo '</form>';


echo'				</div>';
echo'			</div>';
echo'			</section>';
echo'			</header>';

echo'		<section id="one" class="wrapper style1">';
echo'				<header class="major">';
echo'				<h2>Set Up</h2>';
echo'				<p>Please select an option in order to proceed.</p>';
echo'			</header>';
echo'			<div class="container">';
echo'				<div class="row">';
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


 
/*------------------------------------------------------------EDIT USERS------------------------------------------------------------*/
if ($procedure=="edituser"){
  //change to edituser


  $Roles = array("admin"=> "Admin", "tourguide" => "Tour Guide");

  $Username  = $_REQUEST["Username"];
  $Password = $_REQUEST["Password"];
  $UserFullName = $_REQUEST["UserFullName"];
  $roleselected  = $_REQUEST["roleselected"]; 
  $guideselected  = $_REQUEST["guideselected"];
  $userguid 	   	= $_REQUEST["userguid"];
  
  echo'		<section id="one" class="wrapper style1">';
  echo'			<div class="container">';
  echo'				<header class="major">';
  echo'				<h2>Edit User</h2>';
  echo'				<p>Make amendments as required</p>';
  

if ($_REQUEST["savedata"]=="")
  {
    //$MyNewUserGuid = guid();

    $query      = "SELECT * FROM Users WHERE Guid='".$userguid."'";
    $DataTable  = mysqli_query($dbConn, $query);

    while($Rows = mysqli_fetch_assoc($DataTable)) {
    $Password   = $Rows["Password"];
    $UserFullName    = $Rows["UserFullName"];
    $roleselected    = $Rows["roleselected"];
    $guideselected    = $Rows["guideselected"];

   }
} 

else 
{
 $Password  = $_REQUEST["Password"];
 $UserFullName = $_REQUEST["UserFullName"];
 $roleselected = $_REQUEST["roleselected"];
 $guideselected = $_REQUEST["guideselected"];

  $query      = "UPDATE Users SET Password='".addslashes($Password)."',UserFullName'".addslashes($UserFullName)."' WHERE Guid= '".$MyNewUserGuid."'";
  
  mysqli_query($dbConn, $query);

  echo '<meta http-equiv="refresh" content="0;url=setup.php?procedure=usersetup&snackmsg=Edited User!">';
    }




echo '<form name="" action="setup.php?procedure=edituser" method="post">';


echo '<br>Username ';
echo '<br><input name="Username" type="text"  required value="'.$Username.'">';

echo '<br>Password: ';
echo '<br><input name="Password" type="text"   required value="'.$Password.'">';


echo '<br>FullName: ';
echo '<br><input name="UserFullName" type="text"   required value="'.$UserFullName.'">';

echo '<hr>Please Select a Role: <select name="roleselected" required>';

              echo '<option value="">---Please Select A Role---</option>';
              
              foreach ($Roles as $key => $value)
              {
                  echo '<option value="'.$key.'">'.$value.'</option>';
              }
    
            echo '</select>';


echo '<hr>Select Tour Guide: <select name="guideselected" required>';


$query = "SELECT * FROM tourguide ORDER BY TGFullName";
$resultSet = mysqli_query($dbConn, $query);
echo '<option value="">---Please Select A Commission---</option>';
while($RowLine = mysqli_fetch_assoc($resultSet)) {
echo '<option value="'. $RowLine["Guid"]. '"';

if ($RowLine["Guid"]==$post_tourselected){
echo ' selected ';
}

echo '   >'. $RowLine["TGFullName"] .'</option>';
}

echo '</select>';

echo '<input name="savedata" type="hidden" value="yes">';
echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">UPDATE USER</button>';
echo '</form>';


echo'				</div>';
echo'			</div>';
echo'			</section>';
echo'			</header>';






echo'		<section id="one" class="wrapper style1">';
echo'				<header class="major">';
echo'				<h2>Set Up</h2>';
echo'				<p>Please select an option in order to proceed.</p>';
echo'			</header>';
echo'			<div class="container">';
echo'				<div class="row">';
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























/*------------------------------------------------*/
if ($_REQUEST["snackmsg"] <> "")
{
    echo '<div id="snackbar"></div>'.$_REQUEST["snackmsg"].'</div>';
}
/*------------------------FOOTER------------------------*/
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
}
?>