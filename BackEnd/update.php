<?php

require "database.php";

$postData = file_get_contents("php://input");

if(isset($postData) && !empty($postData))
{
	$request = json_decode($postData);

	$inputId        = mysqli_escape_string($connection ,$request->EmpId );
	$inputName      = mysqli_real_escape_string($connection , $request->Empname);
	$inputJobTitle  = mysqli_real_escape_string($connection , $request->EmpJob);
	$inputExp       = mysqli_real_escape_string($connection , $request->EmpExp);

	$query = "UPDATE `emp_details`SET `EmpName`='$inputName',`EmpJob`='$inputJobTitle',`EmpExp`='$inputExp'  WHERE `id`='$inputId'";

	if(mysqli_query($connection,$query))
	{
		http_response_code(201);
		$status = 'Y';
		echo json_encode($status);
	}else
	{
		http_response_code(422);
	}
}
?>