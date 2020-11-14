<?php 
$page_title = 'Violin Services';
include_once ('../../includes/session.php');
if ($_SESSION["user_type_id"] != 1 && $_SESSION["user_type_id"] != 2 && $_SESSION["user_type_id"] != 3 && $_SESSION["user_type_id"] != 4)
	{ 	header("Location: ../../my-account/login.php"); 
		exit();
	}

include_once ('../../includes/header.php');
require_once ('../../../mysqli_connect.php'); 

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
<body style = "background-image: url('violin.jpeg');
				background-repeat: no-repeat;
				background-size: 100%;
				background-attachment: fixed;"
 >
<div class="page-header" align="center">
	 <style>
   		 .heading { color: #ffffff; font-family:Optima; font-size: 70px}
     </style>
	<h1 class="heading">Violin Services</h1>
</div>	
<div align="right" >		
	     <?php
			if($_SESSION["user_type_id"] ==  3)
			echo "<span style='color: #cecece;' /><h3>Admin Account \n</h3></span>";
			else
				echo "<span style='color: #cecece;' /><h3>Teacher Account \n</h3></span>";
		?>
		
</div>
</div>


</head>
<body>	

	<form id = "formid" role="form" action="violinServices.php" method="post">
	<table align="center" class="table table-striped" right = 30px border="2px"  style="width: 500px; line-height: 30px; background-color: #cecece; opacity: .9;">
		<tr>
			<th colspan = "4"><h2 align="center">Courses Offered:</h2></th>
		</tr>
			<th>SERVICE NAME</th>
			<th>DIFFICULTY LEVEL</th>
			<th>GENRE</th>
			<th>DATE OFFERED</th>
		
		<?php
		$sql = "SELECT user_id,service_name,class_difficulty_level,category_genre,date_offered FROM teaching_services WHERE service_name = 'Violin class' AND offered = 1"; 
		$result = mysqli_query($dbc,$sql);
		while($rows = mysqli_fetch_array($result))
		{
			$key = $rows['user_id']; 	
			?>
		<tr>
		
		<td> <?php echo $rows['service_name']?></td>
		<td> <?php echo $rows['class_difficulty_level']?></td>
		<td> <?php echo $rows['category_genre']?></td>
		<td> <?php echo $rows['date_offered']?></td>
		</tr>
		<?php 
		}
		?>
	</table>
	<table align="center" class="table table-striped" left=70px border="2px"  style="width: 500px; line-height: 30px; background-color: #cecece; opacity: .9;">
		<tr>
			<th colspan = "3"><h2 align="center">Violin Teachers</h2></th>
		</tr>
		
			<th>FIRST NAME</th>
			<th>LAST NAME</th>
			<th> EMAIL</th>

		<?php
		$sql2 = "SELECT first_name,last_name,email FROM users WHERE user_id = '" . $key . "'";
		$result2 = mysqli_query($dbc,$sql2);
		while($rows2 = mysqli_fetch_array($result2))
		{
			?>
		<tr>
		
		<td> <?php echo $rows2['first_name']?></td>
		<td> <?php echo $rows2['last_name']?></td>
		<td> <?php echo $rows2['email']?></td>
		</tr>
		<?php 
		}
		?>
	</table>
	</form>	
</body>	

<body>
<style>
.btn 
 {
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 15px;
    color: #ffffff;
    background-color: #03627e;
    border-radius: 4px;
    border: 2px solid #6c98a5;
    position: relative;
    left: 60px;
    position: -webkit-sticky;
  	position: sticky;

}

</style>
<button onclick="goBack()" class="btn">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
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