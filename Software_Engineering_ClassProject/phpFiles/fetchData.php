<?php

require_once ('../../../mysqli_connect.php'); 
$output = '';
$sql = "SELECT service_name,class_difficulty_level,category_genre,date_offered FROM teaching_services WHERE service_name LIKE '%".$_POST["search"]."%'";
$result = mysqli_query($dbc,$sql);
if(mysqli_num_rows($result) > 0
{
	$output .= '<h4 align= "center">Search Result</h4>';
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>SERVICE NAME</th>
							<th>DIFFICULTY LEVEL</th>
							<th>GENRE</th>
							<th>DATE OFFERED</th>
						</tr>';
	while($row  = mysql_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["SERVICE NAME"].'</td>
				<td>'.$row["DIFFICULTY LEVEL"].'</td>
				<td>'.$row["GENRE"].'</td>
				<td>'.$row["DATE OFFERED"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found'
}
?>