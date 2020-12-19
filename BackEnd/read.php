<?php

require 'database.php';

$outputData = [] ; 

$query = "SELECT * from emp_details";

if($result = mysqli_query($connection,$query))
{
	$rowCount = 0 ;

	while($row = mysqli_fetch_assoc($result))
	{
		$outputData[$rowCount]['id']      = $row['id'];
		$outputData[$rowCount]['EmpName'] = $row['EmpName'];
		$outputData[$rowCount]['EmpJob']  = $row['EmpJob'];
		$outputData[$rowCount]['EmpExp']  = $row['EmpExp'];
		$rowCount++;
	}

	echo json_encode($outputData);
}else
{
	http_response_code(404);
}
?>