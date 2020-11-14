<?php 
$page_title = 'Services';
include_once ('../includes/session.php');
// SECURITY SAFETY
if ($_SESSION["user_type_id"] != 1 && $_SESSION["user_type_id"] != 2 && $_SESSION["user_type_id"] != 3 && $_SESSION["user_type_id"] != 4)
 {
	//Redirect:
    header("Location: ../my-account/login.php");
    exit();
}
if (isset($_POST['viewServices']))
 { {	if($_SESSION["user_type_id"] == 3)
			header("Location: services/viewServicesAdmin.php"); 
		else 
			header("Location: services/viewServicesReg.php"); 
		exit();
	}
}
else if (isset($_POST['searchServices']))
{ //update action
    header('Location: services/searchServices.php');
    exit();
} 
else if (isset($_POST['byCategory']))
{
    //no button pressed
    header("Location: services/byCategory.php");
    exit();
}

include_once ('../includes/header.php');
$custom_css = 'content-header.css';
require_once ('../../mysqli_connect.php'); // Connect to the db.
$type = $_SESSION["user_type_id"];
?>

<head>
<style>
.container1 .btn
 {
    border: none;
    cursor: pointer;
    text-align: center;
	background-color:#0b7fa1;
	border-radius:26px;
	color:#ffffff;
	font-family:Georgia;
	font-size:30px;
	font-weight:bold;
	padding:15px 26px;
	text-decoration:none;
	
}
.container1 .btn:hover 
{
	background-color:#1e9abf;
}
.container2 .btn
 {
    border: none;
    cursor: pointer;
    text-align: center;
	background-color:#0b7fa1;
	border-radius:40px;
	color:#ffffff;
	font-family:Georgia;
	font-size:30px;
	font-weight:bold;
	padding:15px 26px;
	text-decoration:none;
	
}
.container2 .btn:hover 
{
	background-color:#1e9abf;
}
.container3 .btn
 {
    border: none;
    cursor: pointer;
    text-align: center;
	background-color:#0b7fa1;
	border-radius:26px;
	color:#ffffff;
	font-family:Georgia;
	font-size:30px;
	font-weight:bold;
	padding:15px 26px;
	text-decoration:none;
	
}
.container3 .btn:hover 
{
	background-color:#1e9abf;
}
.container4 .btn
 {
     width: 500px;
     height: 200px;
     font-family:Georgia;
     padding: 10px;
  	 border: 10px solid gray;
  	 margin: 0;
  	 position; right;
  	 background-color:#cecece;
	
}
</style>

<div class="page-header" align="center">
	 <style>
   		 .heading { color: #ffffff; font-family:Optima; font-size: 85px}
     </style>
	<h1 class="heading">Services</h1>
</div>	
<div align="right" >		
	     <?php
			if($_SESSION["user_type_id"] ==  3)
			echo "<span style='color: #cecece;' /><h3>Admin Account \n</h3></span>";
			if($_SESSION["user_type_id"] ==  4)
			echo "<span style='color: #cecece;' 'background-color:#ffffff;' /><h3>Regular User \n</h3></span>";
		?>
		
</div>
<head>
<style> 
#myButtons 
{
  border: 0px solid black;
  width: 450px;
  height: 200px;
  position: relative;
  top: -205px;
  left: 590px;
}
</style>

</head>
<body style = "background-image: url('services_picture.jpg');
				background-repeat: no-repeat;
				
				background-size: 100%;"
 >
 <form id ="formid" class="form-horizontal" role="form" action="services.php" method="post">
  <br><br><br>

   <table id="myButtons" cellpadding="5" width="75%" >
  <br><br><br><br>
  <br><br><br><br>
  <tr>
       	<th>
						<div class="container1" >	<input id="viewServices" class="btn" type="submit" name="viewServices" value="<?php 
						if($type == 3)  echo 'Add/Edit Services'; 
						else echo 'View Services' ; ?>" > 
					</div> 
	 	</select></th>
  </tr>
  <tr>
    <td style="color:#142850"> 
    				<div class="container2"> <input id="searchServices" class="btn" type="submit" name="searchServices" value="Search Services"> 
    				</div>					
    </td>
  </tr>
  <tr>
    <tr>
    <td style="color: white "> 
    					<div class="container3"><input id="byCategory" class="btn" type="submit" name="byCategory" value="View by Category"> </div>
    </td>
  </tr>


<div  style="color: #cecece; 
	width: 250px;
	height: 100px;
position: relative;
	left: 70px;
	"/><h5>Thank you for logging in. You are now able to browse Services! </h5></ </div>

</div>
</div>
</form> 

<table id="theFooter" align="left"> 
	<tr> 
		<td > 
			<?php include ('../includes/footer.php'); 
			?> 
		</td> 
	</tr> 
</table>
</body>