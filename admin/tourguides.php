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
echo'		<title>Tour Guides | Global Tour Operators</title>';
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
  $procedure="TGview";
  }
/*----------------------------------------------------------DELETE A TOUR----------------------------------------------------------*/
if ($procedure=="delTG"){
	 $tourguideguid 	= $_REQUEST["tourguideguid"];
 	 $query     = "UPDATE tourguide SET Deleted=1 WHERE Guid='".$tourguideguid."'";
     mysqli_query($dbConn, $query);
     echo '<meta http-equiv="refresh" content="0;url=tourguides.php?procedure=TGview">';
	}
/*-------------------------------------------------------CHANGE ACTIVE STATUS-------------------------------------------------------*/

//?procedure=changeTGstatus&tourguideguid={CB7AEBB4-3F7A-08FD-E16E-C8C4FDC8973D}&iam=yes
if ($procedure=="changeTGstatus"){
	 $tourguideguid 		= $_REQUEST["tourguideguid"];
   $whatareyou    = $_REQUEST["iam"];
   
	  if($whatareyou == "yes") {
	    	 $query      = "UPDATE tourguide SET Active=0 WHERE Guid='".$tourguideguid."'";
         mysqli_query($dbConn, $query);
	 	 }else {
	 	    $query      = "UPDATE tourguide SET Active=1 WHERE Guid='".$tourguideguid."'";
         mysqli_query($dbConn, $query);
     }
       
     //  echo $query;
     echo '<meta http-equiv="refresh" content="0;url=tourguides.php?procedure=TGview">';
	}

/*----------------------------------------------------------EDIT TOUR----------------------------------------------------------*/
if ($procedure=="editTG"){

	 $tourguideguid 	   	= $_REQUEST["tourguideguid"];
	 $postTGFullName      = $_REQUEST["postTGFullName"];
   $postTGPhone         = $_REQUEST["postTGPhone"];
   $postTGEmail         = $_REQUEST["postTGEmail"];
    

   echo'		<section id="one" class="wrapper style1">';
   echo'			<div class="container">';
   echo'				<header class="major">';
   echo'				<h2>EDIT TOUR GUIDE</h2>';
   echo'				<p>Please make amendments as required.</p>';

     //echo "<HR> Can i save data : ".$_REQUEST["savedata"];
     //echo "Can i save data? : ".$_REQUEST["savedata"];


     if ($_REQUEST["savedata"]==""){

		   $query      = "SELECT * FROM tourguide WHERE Guid='".$tourguideguid."'";
       $DataTable  = mysqli_query($dbConn, $query);


       
    //echo $query;

	     while($Rows = mysqli_fetch_assoc($DataTable)) {

        $postTGFullName      = $Rows["TGFullName"];
        $postTGPhone         = $Rows["TGPhone"];
        $postTGEmail         = $Rows["TGEmail"];
        $commselected        = $_REQUEST["commselected"];

	
	     	}
     } 
     else 
     {
      $postTGFullName      = $_REQUEST["postTGFullName"];
      $postTGPhone         = $_REQUEST["postTGPhone"];
      $postTGEmail         = $_REQUEST["postTGEmail"];
      $postTGEmail         = $_REQUEST["postTGEmail"];
      $commselected        = $_REQUEST["commselected"];

       $query      = 
       "UPDATE tourguide SET TGFullName='".addslashes($postTGFullName)."',TGPhone='".$postTGPhone."', 
                            TGEmail='".$postTGEmail."',	Commissions_Guid='".$commselected."' WHERE Guid='".$tourguideguid."'";
       mysqli_query($dbConn, $query);

      //echo $query;

    //echo '<meta http-equiv="refresh" content="0;url=tourguides.php?procedure=TGView">';
    

}
  echo  '<BR><BIG><BIG><BIG>Tour Guide Selected: '.$postTGFullName.'</BIG></BIG></BIG>';

  echo '<form name="" action="tourguides.php?procedure=editTG&tourguideguid='.$tourguideguid.'" method="post">';
  echo '<br>Tour Guide name is : ';
  echo '<br><input name="postTGFullName" type="text" size="150" required value="'.$postTGFullName.'">';

  echo '<br>Tour Guide Phone Number is : ';
  echo '<br><input name="postTGPhone" type="phone"  required value="'.$postTGPhone.'">';

  echo '<br>Tour Guide Phone Email is : ';
  echo '<br><input name="postTGEmail" type="text"  required value="'.$postTGEmail.'">';

  echo '<hr>Please select a commission: <select name="commselected" required>';
	$query = "SELECT * FROM commissions WHERE Active=1";
		        $resultSet = mysqli_query($dbConn, $query);
					echo '<option value="">---Please Select A Commission---</option>';
	            while($RowLine = mysqli_fetch_assoc($resultSet)) {
					echo '<option value="'. $RowLine["Guid"]. '"';

					if ($RowLine["Guid"]==$post_tourselected){
					 echo ' selected ';
					}

					echo '   >'. $RowLine["CommissionLevel"] .'</option>';
	            	}

	echo '</select>';



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
if ($procedure=="addTG"){

  $postTGFullName      = $_REQUEST["postTGFullName"];
  $postTGPhone         = $_REQUEST["postTGPhone"];
  $postTGEmail         = $_REQUEST["postTGEmail"];
  $commselected        = $_REQUEST["commselected"];

   if ($_REQUEST["frank"]<>"")
     {
       $myTourGuideGUID = guid();
       $query      = "INSERT INTO tourguide (Guid,TGFullName,TGPhone, TGEmail, Commissions_Guid, Active) VALUES (
						'".$myTourGuideGUID."','". addslashes($postTGFullName) ."','".$postTGPhone."','".$postTGEmail."', '".$commselected."',1)";
       mysqli_query($dbConn, $query);
//echo $query;



      echo '<meta http-equiv="refresh" content="0;url=tourguides.php?procedure=TGview">';
   	}

echo'		<section id="one" class="wrapper style1">';
echo'			<div class="container">';
echo'				<header class="major">';
echo'				<h2>ADD A NEW TOUR GUIDE</h2>';
echo'				<p>Please provide details of the new tour guide you would like to add <br> Please include the Tour Guide`s personal information such as their Full Name, Contact Number and an Email Address.</p>';

echo '<form name="" action="tourguides.php?procedure=addTG" method="post">';
  echo '<br>Tour Guide name is : ';
  echo '<br><input name="postTGFullName" type="text" size="150" required autofocus value="'.$postTGFullName.'">';

  echo '<br>Tour Guide Phone is : ';
  echo '<br><input name="postTGPhone" type="phone"  required value="'.$postTGPhone.'">';

  echo '<br>Tour Guide Email is : ';
  echo '<br><input name="postTGEmail" type="text"  required value="'.$postTGEmail.'">';


  echo '<hr>Please select a commission: <select name="commselected" required>';
  $query = "SELECT * FROM commissions WHERE Active=1";
        $resultSet = mysqli_query($dbConn, $query);
      echo '<option value="">---Please Select A Commission---</option>';
          while($RowLine = mysqli_fetch_assoc($resultSet)) {
      echo '<option value="'. $RowLine["Guid"]. '"';
  
      if ($RowLine["Guid"]==$commselected){
       echo ' selected ';
      }
  
      echo '   >'. $RowLine["CommissionLevel"] .' | '.$RowLine["CommissionPercentage"].'%</option>';
            }
  
  echo '</select>';

  echo '<input name="frank" type="hidden" value="insertit">';
  echo '<br><br><button class="btn1" input type="submit"  value="Save & Insert">ADD TOUR GUIDE</button>';
  echo '</form>';

  echo $postTGFullName;

  echo'				</div>';
  echo'			</div>';
  echo'			</section>';
  echo'			</header>';

echo'           <section class="special box">';
echo'						<i class="icon fa-flag major"></i>';
echo'							<h3>VIEW TOUR GUIDES</h3>';
echo'						<p>View current tour guides </p>';
echo'                               <a href="tourguides.php?procedure=TGview"> <button class="btn1">VIEW TOUR GUIDES</button></a><BR><BR>';
echo'						</section>';
echo'					</div>';
echo'				</div>';
echo'			</div>';
echo'			</section>';
	}
/*------------------------------------------------------VIEW/EDIT/DELETE TOURS-----------------------------------------------------*/
  if ($procedure=="TGview"){
    echo'		<section id="one" class="wrapper style1">';
    echo'				<header class="major">';
    echo'				<h2>Tour Guides</h2>';
    echo'				<p>View, Edit and Delete Tour Guides</p>';
    echo'			</header>';
    
    echo '
      <table>
        <tr>
          <th>Action</th>
          <th>ID</th>
          <th>Full Name</th>
          <th>Contact Number</th>
          <th>Email Address</th>
          <th>Commission Level</th>
          <th>Commission Percentage</th>
          <th>Active</th>
        </tr>';
    
         $query      = "SELECT *,tourguide.Guid AS tgGuid,tourguide.Uid AS  tgUid, tourguide.Active AS tgActive
                      FROM tourguide 
                      LEFT JOIN commissions ON commissions.Guid = tourguide.Commissions_Guid
                      WHERE tourguide.Deleted=0";
                      //ORDER BY name";
                  //echo $query;
         $DataTable  = mysqli_query($dbConn, $query);
         while($Rows = mysqli_fetch_assoc($DataTable)) {
          echo '<tr>';
        echo ' <td>';
       // echo '<a href="tours.php?procedure=addatour"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a>';
        //FONT AWESOME ICONS - EDIT AND DELETE
        
        echo '<a href="tourguides.php?procedure=editTG&tourguideguid='.$Rows["tgGuid"].'"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
          
        echo '<a href="tourguides.php?procedure=delTG&tourguideguid='.$Rows["tgGuid"].'" '. " onclick=\"return confirm('Are you sure you want to delete?')\"".'><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>';
        echo '</td>';
        echo ' <td>'.$Rows["tgUid"].'</td>';
        echo ' <td>'.$Rows["TGFullName"].'</td>';
        echo ' <td>'.$Rows["TGPhone"].'</td>';
        echo ' <td>'.$Rows["TGEmail"].'</td>';
        echo ' <td>'.$Rows["CommissionLevel"].'</td>';
        echo ' <td>'.$Rows["CommissionPercentage"].'</td>';
        //echo ' <td align="right">&euro; '.$Rows["TourPrice"].'</td>';
        echo ' <td>';
        echo '<div class="tooltip">';    
        if ($Rows["tgActive"]==1)
        {
            echo '<span class="tooltiptext">Click to make Inactive</span>';
          echo '<a href="tourguides.php?procedure=changeTGstatus&tourguideguid='.$Rows["tgGuid"].'&iam=yes" title=""><i class="fa fa-check-circle fa-2x" aria-hidden="true"></i></a>';
        }
          else 
          {
          echo '<a href="tourguides.php?procedure=changeTGstatus&tourguideguid='.$Rows["tgGuid"].'&iam=no" title="" ><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>';
            echo '<span class="tooltiptext">Click to make Active</span>';
          }
        echo '</div>';
        echo '</td>';
        echo '</tr>';
      }
     echo' </table>';
     
echo'           <section class="special box"f>';
echo'						<i class="icon fa-flag major"></i>';
echo'							<h3>Add a Tour Guide</h3>';
echo'						<p>Add a Tour Guide </p>';
echo'                               <a href="tourguides.php?procedure=addTG"> <button class="btn1">ADD A TOUR GUIDE</button></a><BR><BR>';
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
