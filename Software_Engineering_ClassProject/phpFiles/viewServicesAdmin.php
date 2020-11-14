<?php 
$page_title = 'Piano Services';
include_once ('../../includes/session.php');
if ($_SESSION["user_type_id"] != 1 && $_SESSION["user_type_id"] != 2 && $_SESSION["user_type_id"] != 3 && $_SESSION["user_type_id"] != 4) 
	{ 	header("Location: ../../my-account/login.php"); 
		exit();
	}

include_once ('../../includes/header.php');
require_once ('../../../mysqli_connect.php'); 

if (isset($_POST['user_id'],$_POST['date_offered'], $_POST['service_name'], $_POST['class_difficulty_level']) ){
	$user_id = $_POST['user_id'];
	$date_offered = $_POST['date_offered'];
	$service_name = $_POST['service_name'];
	$class_difficulty_level = $_POST['class_difficulty_level'];
	
	if($service_name == "Piano class")
	{
		$sql = "INSERT INTO teacher_service (user_id,service_name,class_difficulty_level,category_genre,category_instrument_type,offered,date_offered) VALUES ('$user_id','$service_name','$class_difficulty_level', 'Classical', 'Piano', '1','$date_offered')";

		echo "<p align='center'> <font color=#ec4949  size='9pt'>Thank you!!</font> </p>";;
		mysqli_query($dbc,$sql);
	}
	else if($service_name == "Violin class")
	{
		$sql = "INSERT INTO teacher_service (user_id,service_name,class_difficulty_level,category_genre,category_instrument_type,offered,date_offered) VALUES ('$user_id','$service_name','$class_difficulty_level', 'Classical', 'Violin', '1','$date_offered')";

		echo "<p align='center'> <font color=#ec4949  size='9pt'>Thank you!!</font> </p>";;
		mysqli_query($dbc,$sql);
	}
	else if($service_name == "Guitar class")
	{
		$sql = "INSERT INTO teacher_service (user_id,service_name,class_difficulty_level,category_genre,category_instrument_type,offered,date_offered) VALUES ('$user_id','$service_name','$class_difficulty_level', 'Acoustic', 'Guitar', '1','$date_offered')";

		echo "<p align='center'> <font color=#ec4949  size='9pt'>Thank you!!</font> </p>";;
		mysqli_query($dbc,$sql);
	}
	else if($service_name == "Electric guitar class")
	{
		$sql = "INSERT INTO teacher_service (user_id,service_name,class_difficulty_level,category_genre,category_instrument_type,offered,date_offered) VALUES ('$user_id','$service_name','$class_difficulty_level', 'Rock', 'Electric Guitar', '1','$date_offered')";

		echo "<p align='center'> <font color=#ec4949  size='9pt'>Thank you!!</font> </p>";;
		mysqli_query($dbc,$sql);
	}
	else if($service_name == "Trumpet class")
	{
		$sql = "INSERT INTO teacher_service (user_id,service_name,class_difficulty_level,category_genre,category_instrument_type,offered,date_offered) VALUES ('$user_id','$service_name','$class_difficulty_level', 'Jazz', 'Trumpet', '1','$date_offered')";

		echo "<p align='center'> <font color=#ec4949  size='9pt'>Thank you!!</font> </p>";;
		mysqli_query($dbc,$sql);
	}
	}
?>
<style> 
#theFooter 
{ 	border: 0px solid black; 
	width: 100%; 
	height: 50px; 
	position: relative; 
	top: 600px;
}
</style>

</head>
<body style = "background-image: url('music_bw.JPG');
				background-repeat: no-repeat;
				background-size: 100%;
				background-attachment: fixed;"
 >

<form id = "formid" role="form" action="viewServicesAdmin.php" method="post">

<div class="page-header" align="center">
	 <style>
   		 .heading { color: #ffffff; font-family:Optima; font-size: 70px}
     </style>
     <br><br>
	<h1 class="heading">ADD/EDIT COURSES OFFERED:</h1>
</div>	
<div align="right" >		
	     <?php
			if($_SESSION["user_type_id"] ==  3)
			echo "<span style='color: #cecece;' /><h3>Admin Account \n</h3></span>";
		
		?>
		
</div>
</div>
<br>


<div  style=" position:relative; left:280px; width: 900px; line-height:15px; background-color: #cecece; opacity: .9;">
	<table  class="table table-striped">
	<tr>
	<td>USER ID</td>
	<td>DATE</td>
	<td>SERVICE NAME</td>
	<td>DIFFICULTY LEVEL</td>
	</tr>
	<tr>
	<td><input type="number_format" name="user_id"></td>
	<td><input type="date" id="date_offered" name="date_offered"></td>
	<td><select name="service_name">
	<option name="Electric guitar class" value="Electric guitar class">Electric guitar class</option>
	<option name="Guitar class" value="Guitar class">Guitar class</option>
	<option name="Piano class" value="Piano class">Piano class</option>
	<option name="Saxophone class" value="Saxophone class">Saxophone class</option>
	<option name="Trumpet class" value="Trumpet class">Trumpet class</option>
	<option name="Violin class" value="Violin class">Violin class</option>
	</select></td>
	<td><select name="class_difficulty_level">
			<option name="Beginner" value="Beginner">Beginner</option>
			<option name="Intermediate" value="Intermediate">Intermediate</option>
			<option name="Advanced" value="Advanced">Advanced</option>

	</select></td>

	</tr>
	<tr>
	
	<td align="center" colspan="3"><input type="submit" value="SUBMIT" class="btn"/></td>

	</tr>
	</table>
	</div>

<br><br>
</head>
<body>	
	<table align="center" class="table table-striped" right = 30px border="2px"  style="width: 500px; line-height:15px; background-color: #cecece; opacity: .9;">
		<tr>
			<th colspan = "8"><h2 align="center">Total Courses</h2></th>
		</tr>
			<th>SERVICE ID</th>
			<th>USER ID</th>
			<th>SERVICE NAME</th>
			<th>DIFFICULTY LEVEL</th>
			<th>GENRE</th>
			<th>INSTRUMENT TYPE</th>
			<th>OFFERED</th>
			<th>DATE OFFERED</th>
			
		<?php
		$sql = "SELECT * FROM teaching_services ORDER BY service_name"; 
		$result = mysqli_query($dbc,$sql);
		while($rows = mysqli_fetch_array($result))
		{	
			$offered = "no";
			if($rows['offered'] == 1)
			{
				$offered = "yes";
			}
			?>
			<tr>
			<td> <?php echo $rows['service_id']?></td>
			<td> <?php echo $rows['user_id']?></td>
			<td> <?php echo $rows['service_name']?></td>
			<td> <?php echo $rows['class_difficulty_level']?></td>
			<td> <?php echo $rows['category_genre']?></td>
			<td> <?php echo $rows['category_instrument_type']?></td>
			<td> <?php echo $offered ?></td>
			<td> <?php echo $rows['date_offered']?></td>
			</tr> 
		<?php 
		}
		?>
	</table>

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