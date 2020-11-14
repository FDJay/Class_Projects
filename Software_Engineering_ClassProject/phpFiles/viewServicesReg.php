<?php 
$page_title = 'View Services';
include_once ('../../includes/session.php');
if ($_SESSION["user_type_id"] != 1 && $_SESSION["user_type_id"] != 2 && $_SESSION["user_type_id"] != 3 && $_SESSION["user_type_id"] != 4)
	{ 	header("Location: ../../my-account/login.php"); 
		exit();
	}
include_once ('../../includes/header.php');
require_once ('../../../mysqli_connect.php'); 

mysqli_close($dbc); 
?>

</head>
<body style = "background-image: url('music_bw.JPG');
				background-repeat: no-repeat;
				background-size: 100%;
				background-attachment: fixed;"
 >
<div class="page-header" align="center">
	 <style>
   		 .heading { color: #ffffff; font-family:Optima; font-size: 70px}
     </style>
	<h1 class="heading">View Services</h1>
	<br><br><br>
</div>	
<div align="right" >		
	     <?php
			if($_SESSION["user_type_id"] ==  3)
			echo "<span style='color: #cecece;' /><h3>Admin Account \n</h3></span>";
		
		?>
		
</div>


	<form id = "formid" role="form" action="viewServicesReg.php" method="post">


<!DOCTYPE html>
<html>
<head>
<style>
.center {
  margin: auto;
  background-color: #cecece;
  opacity: .9;
  width: 45%;
  border: 3px solid black;
  padding: 20px;
}
</style>
</head>
<body>

<h3 style="color:#00607c; font-size:330%; text-align:center;"> Beginner</h3>

<div class="center">
  <p align = "center"style="font-size:140%;">The beginner courses are essentially for any age 4+. Our teachers have experience with any type of age when it comes to their teaching strategies. We provide teachers who are passionate at what they do and want to help others in their craft. <br><br>
 Beginner classes: <br>PIANO<br>
 VIOLIN<br>
 GUITAR<br>
 ELECTRIC GUITAR</p>
</div>
<br>
<h3 style="color:#00607c; font-size:330%; text-align:center;"> Intermediate</h3>

<div class="center">
  <p align = "center"style="font-size:140%;">We specialize in our intermediate classes and have a larger variety of the types of intruments we teach.  <br><br>
 Beginner classes: <br>PIANO<br>
 SAXOPHONE<br>
 TRUMPET<br>
 GUITAR<br>
 ELECTRIC GUITAR</p>
</div>
<br>

<h3 style="color:#00607c; font-size:330%; text-align:center;"> Advanced</h3>

<div class="center">
  <p align = "center"style="font-size:140%;">The advanced courses are for those who have more experience and are looking to challenge themselves and advance even more. Our advanced teachers are more than qualified to teach these courses. Many of our teachers have been on stage with famouse artist such as Ariana Grande, and Beyonce from the 'Homecoming' Documentary. <br><br>
 Beginner classes: <br>PIANO<br>
 VIOLIN<br>
 GUITAR<br>
</div>



<table id="theFooter" align="center"> 
	<tr> <td > 
		<div class="wrap-contact100-form-btn"> 
			<div class="contact100-form-bgbtn"> 
			</div> 
			<?php include ('../../includes/footer.php'); 
			?>
			</td> 
		</tr> 
	</table> 
</div>
</body>