<?php $page_title = 'Search Services';
include_once ('../../includes/session.php');
if ($_SESSION["user_type_id"] != 1 && $_SESSION["user_type_id"] != 2 && $_SESSION["user_type_id"] != 3 && $_SESSION["user_type_id"] != 4) 
	{ 
		header("Location: ../my-account/login.php"); 
		exit();
	}
if (isset($_POST['Piano'])) 
	{ 
		header("Location: services/pianoServices.php"); 
		exit();
	} 
else if (isset($_POST['searchServices'])) 
	{ 
		header("Location: services/searchServices.php"); 
		exit();
	} 
else if (isset($_POST['byCategory']))
	{ 
		header("Location: services/byCategory.php"); 
		exit();
	}
include_once ('../../includes/header.php');
require_once ('../../../mysqli_connect.php'); 


mysqli_close($dbc); 
?>

<style> 
#theFooter 
{ 	border: 0px solid black; 
	width: 100%; 
	height: 50px; 
	position: relative; 
	top: 300px;
}
</style> 

</head>
	<style> 
		#mySearch 
		{ 
			border: 3px solid black; 
			width: 580px; 
			height: 50px; 
			position: relative; 
			top: 100px; 
			left: 400px;
			opacity: .9;
		}
	</style> 
	<style> 
		#theTitle 
		{ 	border: 0px solid black; 
			width: 480px; 
			height: 10px; 
			position: center;
		}
	</style>

</head>
<body style = "background-image: url('music_bw.JPG');
				background-repeat: no-repeat;
				background-size: 100%;"
 >
 <br>
<div class="page-header" align="center">
	 <style>
   		 .heading { color: #ffffff; font-family:Optima; font-size: 70px}
     </style>
	<h1 class="heading">Search By Category</h1>
</div>	
<div align="right" >		
	     <?php
			if($_SESSION["user_type_id"] ==  3)
			echo "<span style='color: #cecece;' /><h3>Admin Account \n</h3></span>";
			if($_SESSION["user_type_id"] ==  4)
			echo "<span style='color: #cecece;' 'background-color:#ffffff;' /><h3>Teacher Account \n</h3></span>";
		?>
		
</div>
	
</div>


</head>
<body>
	<div class="wrap-contact100-form-btn">
		<div 
		class="contact100-form-bgbtn">
			
		</div>
	</div>
</div>
	<form id = "formid" role="form" action="byCategory.php" method="post">
	<table id="mySearch" style="background-color:#dddddd;
			background-size: 100%;
			background-repeat: no-repeat;" > 
				<tr>
				<td>
					<table id="theTitle" > 
						<tr> 
						<td align="center" > <h1> 
						<font color="#00688B" style="font-weight: bold; font-family:Optima;font-style: oblique;">  Search</h1></font>
						</td> </tr>
					</table>
						<table id="theMiddle" align="center"> <tr>
							<td> 
									
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  left: -30px;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

.dropbtn2 {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown2 {
  position: relative;
  right: -40px;
  display: inline-block;
}

.dropdown2-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown2-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown2-content a:hover {background-color: #ddd;}

.dropdown2:hover .dropdown2-content {display: block;}

.dropdown2:hover .dropbtn2 {background-color: #3e8e41;}
</style>
</head>
<body>

<div class="dropdown">
  <button class="dropbtn">Instrument Type</button>
  <div class="dropdown-content">
    <a href="pianoServices.php">Piano</a>
    <a href="violinServices.php">Violin</a>
    <a href="guitarServices.php">Guitar</a>
    <a href="electricGuitarServices.php">Electric Guitar</a>
    <a href="saxophoneServices.php">Saxophone</a>
    <a href="trumpetServices.php">Trumpet</a>
  </div>
</div>

</body>
<body>

<div class="dropdown2">
  <button class="dropbtn2">Genre</button>
  <div class="dropdown2-content">
     <a href="classicalServices.php">Classical</a>
    <a href="acousticsServices.php">Acoustic</a>
    <a href="rockServices.php">Rock</a>
    <a href="jazzServices.php">Jazz</a>

  </div>
</div>

</body>
</html>



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