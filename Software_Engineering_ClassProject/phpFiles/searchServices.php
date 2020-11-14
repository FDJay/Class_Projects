<?php $page_title = 'Search Services';
include_once ('../../includes/session.php');
if ($_SESSION["user_type_id"] != 1 && $_SESSION["user_type_id"] != 2 && $_SESSION["user_type_id"] != 3 && $_SESSION["user_type_id"] != 4) 
	{ 
		header("Location: ../my-account/login.php"); 
		exit();
	}
include_once ('../../includes/header.php');
require_once ('../../../mysqli_connect.php'); 
if (isset($_POST['submitted'])) 
{ 	$Piano= "Piano class";
	$piano = "piano class";
	$Violin = "Violin class";
	$violin = "violin class";
	$Trumpet = "Trumpet class";
	$trumpet = "trumpet class";
	$Saxophone ="Saxophone class";
	$saxophone = "saxophone class";
	$Guitar = "Guitar class";
	$guitar = "guitar class";
	$Electric = "Electric Guitar class";
	$Electric2 = "Electric guitar class";
	$electric = "electric guitar class";
	$errors = array();
	if (empty($_POST['search'])) 
	{ 
		$errors[] = 'You must enter something to search' ; 

	}
	else if($_POST['search'] == $Piano || $_POST['search'] == $piano)
	{
		$data = array();
		$sql = "SELECT user_id,service_name,class_difficulty_level,category_genre,date_offered FROM teaching_services WHERE service_name = 'Piano class' AND  offered = 1"; 
		$result = mysqli_query($dbc,$sql);
		while($rows = mysqli_fetch_array($result)){	
			$data[] =  $rows['service_name']; 
		 	$data[] =  $rows['class_difficulty_level']; 
		 	$data[] =   $rows['category_genre']; 
		 	$data[] =   $rows['date_offered'] . "</p>"; 
		}
	}
	else if($_POST['search'] == $Violin || $_POST['search'] == $violin){
		$data2 = array();
		$sql = "SELECT user_id,service_name,class_difficulty_level,category_genre,date_offered FROM teaching_services WHERE service_name = 'Violin class' AND  offered = 1"; 
		$result = mysqli_query($dbc,$sql);
		while($rows = mysqli_fetch_array($result)){
		 	$data2[] =  $rows['service_name']; 
		 	$data2[] =  $rows['class_difficulty_level']; 
		 	$data2[] =   $rows['category_genre']; 
		 	$data2[] =   $rows['date_offered'] . "</p>"; 
		}
	}
	else if($_POST['search'] == $Saxophone || $_POST['search'] == $saxophone){
		$data3 = array();
		$sql = "SELECT user_id,service_name,class_difficulty_level,category_genre,date_offered FROM teaching_services WHERE service_name = 'Saxophone class' AND  offered = 1"; 
		$result = mysqli_query($dbc,$sql);
		while($rows = mysqli_fetch_array($result)){
		 	$data3[] =  $rows['service_name']; 
		 	$data3[] =  $rows['class_difficulty_level']; 
		 	$data3[] =   $rows['category_genre']; 
		 	$data3[] =   $rows['date_offered'] . "</p>"; 
		}
	}
	else if($_POST['search'] == $Guitar || $_POST['search'] == $guitar){
		$data4 = array();
		$sql = "SELECT user_id,service_name,class_difficulty_level,category_genre,date_offered FROM teaching_services WHERE service_name = 'Guitar class' AND  offered = 1"; 
		$result = mysqli_query($dbc,$sql);
		while($rows = mysqli_fetch_array($result)){
		 	$data4[] =  $rows['service_name']; 
		 	$data4[] =  $rows['class_difficulty_level']; 
		 	$data4[] =   $rows['category_genre']; 
		 	$data4[] =   $rows['date_offered'] . "</p>"; 
		}
	}
	else if($_POST['search'] == $Electric || $_POST['search'] == $Electric2 || $_POST['search'] == $electric){
		$data5 = array();
		$sql = "SELECT user_id,service_name,class_difficulty_level,category_genre,date_offered FROM teaching_services WHERE service_name = 'Electric guitar class' AND  offered = 1"; 
		$result = mysqli_query($dbc,$sql);
		while($rows = mysqli_fetch_array($result)){
		 	$data5[] =  $rows['service_name']; 
		 	$data5[] =  $rows['class_difficulty_level']; 
		 	$data5[] =   $rows['category_genre']; 
		 	$data5[] =   $rows['date_offered'] . "</p>"; 
		}
	}
	else{
		echo "<p align='center'> <font color=red  size='5pt'>Data Not Found. Please check spelling and try again</font> </p>";}
}
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
		#mySearch { 
			border: 3px solid black; 
			width: 580px; 
			height: 50px; 
			position: relative; 
			top: 100px; 
			left: 450px;
			opacity: .9;
		}
	</style> 
	<style> 
		#theTitle { 	
			border: 0px solid black; 
			width: 480px; 
			height: 10px; 
			position: center;
		}
	</style>
</head>
<body style = "background-image: url('vinyl.jpeg');
				background-repeat: no-repeat;
				background-size: 100%;
				background-attachment: fixed;">
<div class="page-header" align="center">
	 <style> .heading { color: #ffffff; font-family:Optima; font-size: 70px}
     </style>
	<h1 class="heading">Search Services</h1>
</div>	
<div align="right" >		
	     <?php
			if($_SESSION["user_type_id"] ==  3)
				echo "<span style='color: #cecece;' /><h3>Admin Account \n</h3></span>"; ?>		
</div>
</div>
</head>
<body>
	<div class="wrap-contact100-form-btn">	
		<div class="contact100-form-bgbtn">
		</div>
	</div>
</div>
	<form id = "formid" role="form" action="searchServices.php" method="post">
	<table id="mySearch" style="background-color:#dddddd;
			background-size: 100%;
			background-repeat: no-repeat;" > 
				<tr>
				<td>
					<table id="theTitle" > 
								<tr> 
					<td align="center" > <h1> 
						<font color="#00688B" style="font-weight: bold;"> Classes</h1></font> </td> </tr>
						</table>
						<table id="theMiddle" align="center"> <tr><td> 
		<div style="font-weight: bold;"> 
			<label>Search:</label><br> 
			<div align="left"> 
				<input size="20" type="normal" placeholder="(Ex. Piano class)" autofocus name="search" maxlength="40" value="" style="text-align:center; position: relative; margin: 0px 0;"/>
			</div>
		</input><br>
</input> 
</td> <td> <img src="Or-pic.png" alt="" border=0 height=140 width=30>
</img> </td>
 <td> <br><br> 
 	</div>
 </input>
 <br> </td> 
</tr>
</table><table id="theTitle" > <tr> <td align="center"> <img src="Vline2.png" alt="" border=0 height=36 width=420></img> 
</td> </tr></table>
<table id="theTitle" > <tr> <td align="center"> <input type="hidden" name="submitted" value="TRUE" /><p>
		<button type="submit" name="submit" />Search</button></p> </td> </tr></table></td> </tr></table></form>
<div style= "color: #ffffff; width: 250px; height: 200px; font-size: 20px; position: relative; text-align: center; left: 600px; top: 200px;"> 
	<?php 
	if (!(empty($data)) ) {
	 	echo '<h1>Results: </h1> <p class="data">COURSES CURRENTLY OFFERED:<br />'; 
		foreach ($data as $msg) { 	
			echo " -  $msg<br />\n"; 
		} 
		echo '</p><p> ...</p>'; 
	} ?> 
</div>

<div style= "color: #ffffff; width: 250px; height: 200px; font-size: 20px; position: relative; text-align: center; left: 600px; top: 40px;" >
	<?php 
	if (!(empty($data2)) ) { 	
		echo '<h1>Results: </h1> <p class="data2">COURSES CURRENTLY OFFERED:<br />'; 
		foreach ($data2 as $msg) { 
			echo " -  $msg<br />\n"; 
		} 
		echo '</p><p>...</p>'; 
	} ?> 
</div>

<div style= "color: #ffffff; width: 250px; height: 200px; font-size: 20px; position: relative; text-align: center; left: 600px; top: -125px;" >
	<?php 
	if (!(empty($data3)) ) {
	 	echo '<h1>Results: </h1> <p class="data3">COURSES CURRENTLY OFFERED:<br />'; 
		foreach ($data3 as $msg) 
		{ 	echo " -  $msg<br />\n"; 
		} 
		echo '</p><p>...</p>'; 
	} ?> 
</div>

<div style= "color: #ffffff; width: 250px; height: 200px; font-size: 20px; position: relative; text-align: center; left: 600px; top: -350px;" >
	<?php 
	if (!(empty($data4)) ) 
	{ 	echo '<h1>Results: </h1> <p class="data4">COURSES CURRENTLY OFFERED:<br />'; 
		foreach ($data4 as $msg) 
		{ 	echo " -  $msg<br />\n"; 
		} 
		echo '</p><p>...</p>'; 
	} ?> 
</div>

<div style= "color: #ffffff; width: 250px; height: 200px; font-size: 20px; position: relative; text-align: center; left: 600px; top: -600px;" >
	<?php 
	if (!(empty($data5)) ) 
	{ 	echo '<h1>Results: </h1> <p class="data5">COURSES CURRENTLY OFFERED:<br />'; 
		foreach ($data5 as $msg) 
		{ 	echo " -  $msg<br />\n"; 
		} 
		echo '</p><p> ...</p>'; 
	} ?> 
</div>

<div align="left" style= "color: #d60707; width: 250px; height: 200px; position: relative; left: 600px; top: -800px;" >
	<?php 
	if (!(empty($errors)) ) 
	{ 	echo '<h1>Error!</h1> <p class="error">The following error(s) occurred:<br />'; ?> <br> <?php foreach ($errors as $msg) 
		{ 	echo "  $msg<br />\n"; 
		} 
		echo '</p><p> - Please try again.</p>'; 
	} ?> 
</div> </td> </tr></table> 
<body>
<style>
.btn {
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 15px;
    color: #ffffff;
    background-color: #03627e;
    border-radius: 4px;
    border: 2px solid #6c98a5;
    position: relative;
    left: 0px;
    position: -webkit-sticky;
  	position: sticky; }
</style>
<button onclick="goBack()" class="btn">Go Back</button>
<script>
function goBack() {
  window.history.back();}
</script>
</body>
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